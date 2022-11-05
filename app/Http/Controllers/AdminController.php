<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

use Illuminate\Support\Facades\Storage;

use App\Models\Booking;
use App\Models\Vendor;
use App\Models\User;
use App\Models\VendorService;
use App\Models\Service;
use App\Models\VendorStaff;
use Carbon\Carbon;
use DB;
use Dompdf\Dompdf;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $data['totalBookings']=Booking::count();
        $data['totalVendor']=Vendor::count();
        $data['totalService']=Service::count();
        $data['totalUsers']=User::where([['user_type','<>','admin']])->count();
        return view('admin.dashboard',compact('data'));
    }

    public function vendorDashboard()
    {
        $vendor_id = Auth::user()->vendor->id;
        $data['totalBookings']=Booking::where([['vendor_id','=',$vendor_id]])->count();
        $data['totalInvoices']=DB::table('order_invoice')->where([['vendor_id','=',$vendor_id]])->get()->count();
        $data['totalService']=VendorService::where([['vendor_id','=', $vendor_id]])->count();
        $data['totalStaff']=VendorStaff::where('vendor_id', $vendor_id)->count();
        return view('admin.vendor_dashboard',compact('data'));
    }
    
    public function vendorChangePassword(){
        return view('admin.changepassword');
        
    }
    
    public function vendorUpdatePassword(Request $request){
        // dd($request->all());
        $request->validate([
            'old_password'=>'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
        ]);
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            // exit;
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        if($user->save()){
            if (Auth::user()->user_type=='vendor') {
                $route = 'vendor.login';
            } elseif (Auth::user()->user_type=='super_admin') {
                $route = 'admin.login';
            } elseif (Auth::user()->user_type=='employee') {
                $route = 'admin.login';
            }
            Auth::logout();
            return redirect()->route($route)->with('success','You are successfully logout');

        }else{
            return back()->with('error','Something Went Wrong !!');
        }

        
    }
     /********************All Custom Invoices******************/
     /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function allinvoices(Request $request){
        $datas['pagetitle']='';
         $vendor_id = Auth::user()->vendor->id;
        $datas['allinvoices']=DB::table('order_invoice')->where('vendor_id',$vendor_id)->orderBy('id','DESC')->get();
        // dd($datas);
        return view('admin.invoices.index',compact('datas'));
    } 
    
    public function addinvoice(Request $request){
         $datas['pagetitle']='';
        return view('admin.invoices.add',compact('datas'));
    }
    
    public function saveinvoice(Request $request){
        //  dd($request->all());
        $request->validate([
            'customer_name'=>'required',
            'customer_mobile' => 'required',
            'grandTotal'=>'required',
        ]);
        $vendor_id = Auth::user()->vendor->id;
        $getHighestInvoicNumber = collect(DB::select('SELECT MAX(ABS(`invoice_number`)) AS `invoiceNumber` FROM `order_invoice` WHERE vendor_id=? ORDER BY `id` DESC LIMIT 1',[$vendor_id]))->first();
        //dd($getHighestInvoicNumber);
        if($getHighestInvoicNumber->invoiceNumber==''){
            $getHighestInvoicNumber->invoiceNumber=1;
        }else{
            $getHighestInvoicNumber->invoiceNumber=(int)$getHighestInvoicNumber->invoiceNumber+1;
        }
        
        $updateArr['vendor_id']=$vendor_id;
        $updateArr['invoice_number']=$getHighestInvoicNumber->invoiceNumber;
        $updateArr['customer_name']=$request->customer_name;
        $updateArr['customer_mobile']=$request->customer_mobile;
        $updateArr['grand_total']=$request->grandTotal;
        $updateArr['invoice_date']=Carbon::now();
        $updateArr['subtotal']=$request->subtotal;
        $updateArr['total_in_text']=$this->getIndianCurrency($request->grandTotal);
        $updateArr['status']=1;
        $updateArr['datetime']=Carbon::now();
       // dd($updateArr);
        DB::table('order_invoice')->insert($updateArr);
        $lastInsertId = DB::getPdo()->lastInsertId();
        foreach($request->particular_item as $itemData){
            unset($updateArr);    
            $updateArr['invoice_id']=$lastInsertId;
            $updateArr['particular_desc']=$itemData['item_name'];
            $updateArr['rate']=$itemData['rate'];
            $updateArr['quantity']=$itemData['quantity'];
            $updateArr['total']=$itemData['total'];
            $updateArr['datetime']=Carbon::now();
            DB::table('order_invoice_item')->insert($updateArr);
        }
         if (!empty($lastInsertId)) {
            $this->createInvoiceFile($lastInsertId); 
           
            return  redirect()->route('vendor.allinvoices')->with('success','Invoice successfully created!!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    } 
    private function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }
    
    private function createInvoiceFile($invoiceid){
        $vendor_id = Auth::user()->vendor->id;
        $invoicesDetail=DB::table('order_invoice')->where([['vendor_id','=',$vendor_id],['id','=',$invoiceid]])->first();
        $getinvoiceitems=DB::table('order_invoice_item')->where([['invoice_id','=',$invoiceid]])->get();
        //dd($getinvoiceitems);
        $base64Logo='';
        if(!empty(Auth::user()->vendor->feature_image)){
            $path = url('/public/storage/').'/'. Auth::user()->vendor->feature_image;
            // echo $path;exit;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        $html='';
        $html.='<html><head><title></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><style>@font-face {
          font-family: \'Open Sans\';
          font-style: normal;
          font-weight: normal;
          src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format(\'truetype\');
        } table td{padding:5px;}@page { margin: 15px; }
        body { margin: 15px; }
        .firm_name{margin-bottom:0px;}
        .tbodyData td{
            border:none;      
        }</style>
        </head><body>';
            $html.='<table border="1" style="border-collapse: collapse;width:100%"><tr><td align="center">';
                $html.='<h2 class="firm_name"><b>'.Auth::user()->vendor->firm_name.'</b></h2>';

                // if(!empty($base64Logo)){
                //     $html.='<img width="200" alt="'. Auth::user()->vendor->firm_name.'" src="'.$base64Logo.'">';
                // } else{
                //     $html.='<b>'.Auth::user()->vendor->firm_name.'</b>';
                // }
            $html.='<br/><strong>'.Auth::user()->vendor->firm_address.'<br/>Contact Number : '.Auth::user()->vendor->mobile.'.</strong><br/>';
                 
                    $html.='<h3>INVOICE</h3>';
                
                $html.='</td></tr></table>';
            $html.='<table border="1" style="border-collapse: collapse;width:100%"><tr><td rowspan="2" style="width:68%">To,<br/>
                Mr/Mrs/M/s: <strong>'.$invoicesDetail->customer_name.'</strong><br/>
                Tel.:  <strong>'.$invoicesDetail->customer_mobile.'</strong><br/>
                <td>Invoice No.</td><td>'.$invoicesDetail->invoice_number.'</td></tr>
                <tr><td>Invoice Date</td><td>'.date('d F Y',strtotime($invoicesDetail->invoice_date)).'</td></tr> </table>'; 
            $html.='<table border="1" style="border-collapse: collapse;width:100%"><thead>
                <tr>
                    <th style="text-align:left">Particulars</th> 
                    <th style="text-align:center">Qty</th>
                    <th style="text-align:center">Rate<br/>(<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>)</th>
                    <th style="text-align:center">Total<br/>(<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>)</th> 
                    
                </tr> 
            </thead>
            <tbody class="tbodyData">';
            if(!empty($getinvoiceitems)){
                $subtotal=0;
                foreach($getinvoiceitems as $gI){
                    $html.='<tr><td style="text-align:left;word-wrap: break-word">'.$gI->particular_desc.'</td>
                                <td align="center">'.$gI->quantity.'</td>
                                <td align="center">'.$gI->rate.'</td>
                                <td align="center">'.number_format($gI->total,2,'.',',').'</td>
                            </tr>';
                    $subtotal+=$gI->total;
                     
                }
            }
            $html.='</tbody><tfoot style="text-align:center"><tr>
                <td colspan="3" align="right"><strong>Total</strong></td>
                <td><strong>'.number_format($subtotal,2,'.',',').'</strong></td></tr></tfoot></table>';

            $html.='<table border="1" style="border-collapse: collapse;width:100%"><tr><td valign="top" rowspan="2" style="width:68%"><strong>Amount in words:<br/>'.strtoupper($invoicesDetail->total_in_text).'</strong><br/>
                        <td>Sub Total</td><td style="font-weight:bold;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>&nbsp;'.number_format($invoicesDetail->subtotal,2,'.',',').'</td></tr> 
                        <tr><td style="background-color:gray;font-weight:bold;">Total</td>
                        <td style="font-weight:bold;font-size:20px"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>&nbsp;'.number_format($invoicesDetail->grand_total,2,'.',',').'</td></tr></table>
                        <table border="1" style="border-collapse: collapse;width:100%"><tr><td width="70%" valign="top">E. & O.E</td><td align="center"><strong>'.Auth::user()->vendor->firm_name.'</strong><br/><br/><br/><div style="height:30px;">&nbsp;</div><strong style="color:red">Proprietor</strong><br/><strong>(Authorized Signatory)</strong></td></tr></table></body>
            </html>';     
            $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

            $dompdf = new Dompdf();
        
            $dompdf->loadHtml($html);
        
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'potrait');
        
            // Render the HTML as PDF
            $dompdf->render();
            $output = $dompdf->output();
            $filename= Auth::user()->vendor->id.'/'.$invoiceid.'.pdf';
            Storage::put('public/uploads/invoices/'.$filename,$output);
            
            DB::table('order_invoice')->where('id',$invoiceid)->update(['invoice_file'=> $filename]);
            // exit;
             return $filename;
    }
    
        public function editprofile()
    {

        $data = Vendor::where('user_id', Auth::user()->id)->first();
        return view('vendor.profile.edit', compact('data'));

    }

    public function updateprofile(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'firm_name' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'firm_address' => 'required|string',
            'serviceFor' => 'required|string',
            'whatsapp_number' => 'required|string|max:10',
            'email' => 'required|email',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'feature_image' => 'nullable|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'gst_file' => 'nullable|mimes:png,jpg,jpeg,svg,gif,pdf|max:300|min:10',
            'about_firm' => 'required|string',
            'password' => 'nullable',
        ]);

        $id= Auth::user()->vendor->id;
        
        $data = Vendor::findOrfail($id);
        
        if ($data) {
            $user = User::findOrfail($data->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            if ($user->update()) {
                $data->name = $request->name;
                $data->user_id = $user->id;
                $data->firm_name = $request->firm_name;
                $data->country_id = $request->country;
                $data->state_id = $request->state;
                $data->city_id = $request->city;
                $data->firm_address = $request->firm_address;
                $data->service_for = $request->serviceFor;
                $data->whatsapp_number = $request->whatsapp_number;
                $data->gst_number = $request->gst_number;
                $data->about_firm = $request->about_firm;
                if ($request->amenities) {
                    $data->amenities = json_encode($request->amenities);
                } else {
                    $data->amenities = "[]";
                }
                $data->latitude = $request->latitude;
                $data->longitude = $request->longitude;
                $data->facebook = $request->facebook;
                $data->twitter = $request->twitter;
                $data->youtube = $request->youtube;
                $data->instagram = $request->instagram;
                $data->position = $request->position;
                if ($request->paymentMethod) {
                    $data->payment_methods = json_encode($request->paymentMethod);
                } else {
                    $data->payment_methods = "[]";
                }
                $data->feature_image = $request->feature_image;
                $data->pincode = $request->pincode;
                $data->tag_line = $request->tag_line;

                if ($request->hasFile('gst_file')) {
                    $data->gst_file = $request->gst_file->store('uploads/vendor/gst', 'public');
                }
                if ($request->hasFile('feature_image')) {
                    $data->feature_image = $request->feature_image->store('uploads/vendor/feature', 'public');
                }
                if ($request->hasFile('thumbnail')) {
                    $data->thumbnail = $request->thumbnail->store('uploads/vendor/thumbnail', 'public');
                }

                if ($data->save()) {
                    return back()->with('success', 'Profile Updated successfully !!');
                } else {
                    return back()->with('error', 'Something went wrong!!');
                }
            } else {
                return back()->with('error', 'Something went wrong unable to Update Profile !!');
            }
        } else {
            return back()->with('error', 'Something went wrong!!');
        }

    }
}

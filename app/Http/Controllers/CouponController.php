<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Str;
use App\Models\VendorCoupon;
use App\Models\Vendor;
use Auth;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Coupon::latest()->paginate(10);
        return view('admin.coupon.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|min:6|max:10|unique:App\Models\Coupon',
            'title' => 'required|max:255',
            'coupon_type' => 'required|in:single,multiple',
            'discount_type' => 'required|in:percentage,flat',
            'minimum_booking_value' => 'required|numeric',
            'maximum_discount_value' => 'required|numeric',
            'info' => 'required',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date|after:start_date',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,svg,gif',
        ]);
        if($request->discount_type=='percentage'){
            $request->validate([
                'discount_type' => 'required|in:percentage,flat',
            ]);
        }
        $data=new Coupon;
        $data->coupon_code=$request->coupon_code;
        $data->title=$request->title;
        $data->coupon_type=$request->coupon_type;
        $data->discount_type=$request->discount_type;
        $data->minimum_booking_value=$request->minimum_booking_value;
        $data->maximum_discount_value=$request->maximum_discount_value;
        $data->discount=$request->discount;
        $data->info=$request->info;
        $data->slug=Str::slug($request->title);
        $data->start_date=$request->start_date;
        $data->expiry_date=$request->expiry_date;
        if($request->hasFile('thumbnail'))
        {
              $data->thumbnail = $request->thumbnail->store('uploads/coupon', 'public');
        }
        if ($data->save()) {
            return back()->with('success','Coupon saved successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=Coupon::find($id);
        return view('admin.coupon.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'coupon_type' => 'required|in:single,multiple',
            'discount_type' => 'required|in:percentage,flat',
            'minimum_booking_value' => 'required|numeric',
            'maximum_discount_value' => 'required|numeric',
            'info' => 'required',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date|after:start_date',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png,svg,gif',
        ]);
        $data=Coupon::find($id);
        if ($data) {
                $data->title=$request->title;
                $data->coupon_type=$request->coupon_type;
                $data->discount_type=$request->discount_type;
                $data->minimum_booking_value=$request->minimum_booking_value;
                $data->maximum_discount_value=$request->maximum_discount_value;
                $data->discount=$request->discount;
                $data->info=$request->info;
                $data->start_date=$request->start_date;
                $data->expiry_date=$request->expiry_date;
                if($request->hasFile('thumbnail'))
                {
                    $data->thumbnail = $request->thumbnail->store('uploads/coupon', 'public');
                }
            if ($data->update()) {
                return back()->with('success','Coupon saved successfully !!');
            } else {
                return back()->with('error','Something Went Wrong !!');
            }
        }else{
            abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Coupon::findOrfail($id)->delete())
        {
            return back()->with('success','Coupon deleted successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }
    public function ActiveCoupon(Request $request){
        $vendor=Vendor::whereUserId(Auth::id())->first();
        if($vendor_coupon=VendorCoupon::whereCouponId($request->id)->whereVendorId($vendor->id)->first()){
            $vendor_coupon->status = $request->status;
            if($vendor_coupon->update()){
                if($vendor_coupon->status==0){
                    return 0;
                }elseif($vendor_coupon->status==1){
                    return 1;
                }
            }
             
        } else{
            $coupon=Coupon::find($request->id);
            $vendor_coupon =new VendorCoupon;
            $vendor_coupon->discount = $coupon->discount;
             $vendor_coupon->coupon_code= $coupon->coupon_code;
            $vendor_coupon->coupon_id = $request->id;
            $vendor_coupon->vendor_id = $vendor->id;
            $vendor_coupon->status = $request->status;
            if($vendor_coupon->save()){
                if($vendor_coupon->status==0){
                    return 0;
                }elseif($vendor_coupon->status==1){
                    return 1;
                }
            }
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Vendor::latest()->paginate(10);
        return view('admin.vendor.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
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
            'name'=> 'required|string|max:255',
            'firm_name'=> 'required|string',
            'state'=>'required|string',
            'country'=>'nullable|string',
            'city'=>'required|string',
            'firm_address'=> 'required|string',
            'serviceFor'=> 'required|string',
            'mobile'=> 'required|string|max:10|unique:App\Models\User',
            'whatsapp_number'=> 'required|string|max:10',
            'email'=> 'required|email|unique:App\Models\User',
            'gst_number'=> 'nuulable|string',
            'thumbnail'=> 'nuulable|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'feature_image'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'gst_file'=> 'required|mimes:png,jpg,jpeg,svg,gif,pdf|max:300|min:10',
            'about_firm'=> 'required|string',
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->user_type='vendor';
        $user->active=1;
        $user->password= Hash::make($request->mobile);
        if($user->save())
        {
            $data= new Vendor;
            $data->name=$request->name;
            $data->user_id=$user->id;
            $data->firm_name=$request->firm_name;
            $data->state_id=$request->state;
            $data->country_id=$request->country;
            $data->city_id=$request->city;
            $data->firm_address=$request->firm_address;
            $data->service_for=$request->serviceFor;
            $data->mobile=$request->mobile;
            $data->whatsapp_number=$request->whatsapp_number;
            $data->gst_number=$request->gst_number;
            $data->about_firm=$request->about_firm;
            if ($request->amenities) {
                $data->amenities=json_encode($request->amenities);
            }
            else{
                $data->amenities="[]";
            }
            $data->latitude=$request->latitude;
            $data->longitude=$request->longitude;
            $data->facebook=$request->facebook;
            $data->twitter=$request->twitter;
            $data->youtube=$request->youtube;
            $data->instagram=$request->instagram;
            $data->position=$request->position;
            if ($request->paymentMethod) {
                $data->payment_methods=json_encode($request->paymentMethod);
            }
            else{
                $data->payment_methods="[]";
            }
            $data->feature_image=$request->feature_image;
            $data->pincode=$request->pincode;
            $data->tag_line=$request->tag_line;

            if($request->hasFile('gst_file'))
            {

                $data->gst_file = $request->gst_file->store('uploads/vendor/gst', 'public');
             }
             if($request->hasFile('feature_image'))
             {
                $data->feature_image = $request->feature_image->store('uploads/vendor/feature', 'public');
              }
              if($request->hasFile('thumbnail'))
              {
                $data->thumbnail = $request->thumbnail->store('uploads/vendor/thumbnail', 'public');
             }
             $data->added_by_id= Auth::user()->id;
             $data->added_by=Auth::user()->user_type;
            if($data->save())
            {
                return back()->with('success','Vendor created successfully !!');
            }
            else{
                return back()->with('error','Something went wrong!!');
            }
        }
        else{
            return back()->with('error','Something went wrong unable to create user !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Vendor::findOrfail($id);
        if($data)
        {
        return view('admin.vendor.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'firm_name'=> 'required|string',
            'state'=>'required|string',
            'city'=>'required|string',
            'firm_address'=> 'required|string',
            'serviceFor'=> 'required|string',
            'whatsapp_number'=> 'required|string|max:10',
            'email'=> 'required|email',
            'thumbnail'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'feature_image'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:300|min:10',
            'gst_file'=> 'nullable|mimes:png,jpg,jpeg,svg,gif,pdf|max:300|min:10',
            'about_firm'=> 'required|string',
            'password'=> 'nullable'
        ]);

        $data= Vendor::findOrfail($id);
        if($data)
        {
        $user = User::findOrfail($data->user_id);
        $user->name=$request->name;
        $user->email=$request->email;
        if ($request->password) {
            $user->password=Hash::make($request->password);
        }
        if($user->update())
        {
            $data->name=$request->name;
            $data->user_id=$user->id;
            $data->firm_name=$request->firm_name;
            $data->country_id=$request->country;
            $data->state_id=$request->state;
            $data->city_id=$request->city;
            $data->firm_address=$request->firm_address;
            $data->service_for=$request->serviceFor;
            $data->whatsapp_number=$request->whatsapp_number;
            $data->gst_number=$request->gst_number;
            $data->about_firm=$request->about_firm;
            if ($request->amenities) {
                $data->amenities=json_encode($request->amenities);
            }
            else{
                $data->amenities="[]";
            }
            $data->latitude=$request->latitude;
            $data->longitude=$request->longitude;
            $data->facebook=$request->facebook;
            $data->twitter=$request->twitter;
            $data->youtube=$request->youtube;
            $data->instagram=$request->instagram;
            $data->position=$request->position;
            if ($request->paymentMethod) {
                $data->payment_methods=json_encode($request->paymentMethod);
            }
            else{
                $data->payment_methods="[]";
            }
            $data->feature_image=$request->feature_image;
            $data->pincode=$request->pincode;
            $data->tag_line=$request->tag_line;

            if($request->hasFile('gst_file'))
            {
                $data->gst_file = $request->gst_file->store('uploads/vendor/gst', 'public');
             }
             if($request->hasFile('feature_image'))
             {
                $data->feature_image = $request->feature_image->store('uploads/vendor/feature', 'public');
              }
              if($request->hasFile('thumbnail'))
              {
                $data->thumbnail = $request->thumbnail->store('uploads/vendor/thumbnail', 'public');
             }


            if($data->save())
            {
                return back()->with('success','Vendor created successfully !!');
            }
            else{
                return back()->with('error','Something went wrong!!');
            }
        }
        else{
            return back()->with('error','Something went wrong unable to create user !!');
        }
    }
    else{
        return back()->with('error','Something went wrong!!');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            if(User::findOrfail(Vendor::findOrfail($id)->user_id)->delete())
            {
            if(Vendor::findOrfail($id)->delete())
            {
                return back()->with('success','Category deleted successfully !!');
            }
            else{
                return back()->with('error','Something went wrong!!');
            }
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }
    
    public function updateStatus(Request $request){
       $vendor= Vendor::findOrfail($request->id);
       $vendor->status_id=$request->status;
       $vendor->update();
       if($vendor->status_id==4){
          return 4; 
       } elseif($vendor->status_id==1){
          return 1; 
       }
    }
    public function updateFeatured(Request $request){
       $vendor= Vendor::findOrfail($request->id);
       $vendor->featured=$request->status;
       $vendor->update();
       if($vendor->featured==1){
          return 1; 
       } elseif($vendor->featured==0){
          return 0; 
       }
    }

}

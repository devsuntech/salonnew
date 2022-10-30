<?php

namespace App\Http\Controllers;

use App\Models\VendorStaff;
use Illuminate\Http\Request;
use Auth;
class VendorStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=VendorStaff::where('vendor_id', Auth::user()->vendor->id)->latest()->paginate(10);
        return view('vendor.staff.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.staff.create');
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
            'name' => 'required|string|max:120',
            'services' => 'required|array',
            'profile_pic' => 'mimes:png,jpg,jpeg',
            'about_us' => 'nullable|string|max:300'
       ]);
        $data=new VendorStaff;
        $data->vendor_id=Auth::user()->vendor->id;
        $data->name=$request->name;
        $data->description=$request->about_us;
        if($request->services){
             $data->services=json_encode($request->services);
        } else{
            $data->services='[]';
        }
        if($request->hasFile('profile_pic')){
           $data->profile_pic = $request->profile_pic->store('uploads/staff');
        }
        if($data->save()) {
                return back()->with('success','Staff Add successfully !!');
        } else{
             return back()->with('error','Something went wrong!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorStaff  $vendorStaff
     * @return \Illuminate\Http\Response
     */
    public function show(VendorStaff $vendorStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorStaff  $vendorStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= VendorStaff::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first();
        if($data)
        {
            return view('vendor.staff.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorStaff  $vendorStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'services' => 'required|array',
            'profile_pic' => 'nullable|mimes:png,jpg,jpeg',
            'about_us' => 'nullable|string|max:300'
        ]);
        if ($data= VendorStaff::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first()) {
            $data->vendor_id=Auth::user()->vendor->id;
            $data->name=$request->name;
            $data->description=$request->about_us;
            if($request->services){
                $data->services=json_encode($request->services);
            } else{
                $data->services='[]';
            }
            if($request->hasFile('profile_pic')){
                $data->profile_pic = $request->profile_pic->store('uploads/staff', 'public');
            }
            if($data->save()) {
                    return back()->with('success','Staff Update successfully !!');
            } else{
                return back()->with('error','Something went wrong!!');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorStaff  $vendorStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($data= VendorStaff::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first())
        {
            $data->delete();
            return back()->with('success','Staff deleted successfully !!');
        }
        else{
            abort(404);
        }
    }
}

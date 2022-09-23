<?php

namespace App\Http\Controllers;

use App\Models\VendorService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Vendor;
use Auth;
class VendorServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=VendorService::where('vendor_id', Auth::user()->vendor->id)->latest()->paginate(10);
        return view('vendor.service.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor=Vendor::whereUserId(Auth::id())->first();

        $request->validate([
           //'category' => 'required|numeric',
           'service_id' => [
            'required',
            ],
            'sub_service' => 'required|numeric',
            'price' => 'required|numeric',
            'min_service_time' => 'required|numeric',
            'max_service_time' => 'required|numeric',
        ]);

        $category_id = \App\Models\Service::find($request->service_id)->value('category_id');

        $data=new VendorService;
        $data->vendor_id=$vendor->id;
        $data->service_id=$request->service_id;
        $data->category_id=$category_id;
        $data->subservice_id=$request->sub_service;
        $data->price=$request->price;
        $data->minimum_time=$request->min_service_time;
        $data->maximum_time=$request->max_service_time;
        $data->save();
        return back()->with('success','Service Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorService  $vendorService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorService  $vendorService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if($data=VendorService::find($id)){
            return view('vendor.service.edit',compact('data'));
        }else{
            abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorService  $vendorService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
           //'category' => 'required|numeric',
           'service' => 'required|numeric',
            'sub_service' => 'required|numeric',
            'price' => 'required|numeric',
            'min_service_time' => 'required|numeric',
            'max_service_time' => 'required|numeric',
        ]);
        $data=VendorService::find($id);
        $data->vendor_id=Vendor::whereUserId(Auth::id())->first()->id;
        $data->service_id=$request->service;
        $data->subservice_id=$request->sub_service;
        $data->price=$request->price;
        $data->minimum_time=$request->min_service_time;
        $data->maximum_time=$request->max_service_time;
        $data->save();
        return back()->with('success','Service Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorService  $vendorService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($data=VendorService::find($id)){
           $data->delete();
           return back()->with('success','Service Delete Successfully');
        } else{
            abort(404);
        }
    }
}

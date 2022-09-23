<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;


class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Amenity::latest()->paginate(10);
        return view("admin.amenity.index",compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.amenity.create');


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
            'name'=> 'required|string|max:255|unique:App\Models\Amenity',
            'icon'=> 'required|string|max:255',

        ]);
        $data= new Amenity();
        $data->name=$request->name;
        $data->icon=$request->icon;
        if($data->save())
        {
            return back()->with('success','Amenity created successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorAmenity  $vendorAmenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorAmenity  $vendorAmenity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Amenity::findOrfail($id);
        if($data)
        {
        return view('admin.amenity.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorAmenity  $vendorAmenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'icon'=> 'required|string|max:255',
            ]);
        $data= Amenity::findOrfail($id);
        if($data)
        {
        $data->name=$request->name;
        $data->icon=$request->icon;
        if($data->update())
        {
            return back()->with('success','Amenity updated successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
        }
        else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorAmenity  $vendorAmenity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Amenity::findOrfail($id)->delete())
        {
            return back()->with('success','Amenity deleted successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }
}

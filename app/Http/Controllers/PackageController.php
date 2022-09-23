<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Str;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Package::orderBy('position')->paginate(10);
        return view('admin.package.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.package.create');
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
            'name'=>'required|string|max:255|unique:App\Models\Package',
            'validity'=>'required|numeric',
            //'validity_type'=>'required|in:Days,Months,Year',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
            'position'=>'required|numeric',
            'description'=>'nullable|string',

        ]);
        $data=new Package;
        $data->name=$request->name;
        $data->validity=$request->validity;
        $data->description=$request->description;
        //$data->validity_type=$request->validity_type;
        $data->position=$request->position;
        $data->price=$request->price;
        $data->status=1;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->icon->store('uploads/package', 'public');
        }
        if ($data->save()) {
            return back()->with('success','Plan saved successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Package::findOrfail($id);
        return view('admin.package.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string',
            'validity'=>'required|numeric',
            //'validity_type'=>'required|in:Days,Months,Year',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
            'position'=>'required|numeric',
            'description'=>'required|string',

        ]);
        $data=Package::findOrfail($id);
        $data->name=$request->name;
        $data->validity=$request->validity;
        $data->description=$request->description;
        //$data->validity_type=$request->validity_type;
        $data->position=$request->position;
        $data->price=$request->price;
        //$data->status=1;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->icon->store('uploads/package', 'public');
        }
        if ($data->update()) {
            return back()->with('success','Plan update successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Package::findOrfail($id)->delete())
       {
        return back()->with('success','Plan deleted successfully !!');
             }else{
        return back()->with('error','Something Went Wrong !!');
             }
    }
}

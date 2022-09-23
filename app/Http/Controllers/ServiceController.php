<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas=Service::latest()->paginate(10);
       return view('admin.service.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'name'=>'required|string|max:255|unique:App\Models\Service',
            'category'=>'required|numeric',
            'icon'=>'required|mimes:png,jpg|max:100|min:10',
            'description'=>'required|string',
            'meta_title'=>'required|string|max:255',
            'meta_description'=>'required|string',

        ]);
        $data=new Service;
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->description=$request->description;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->icon->store('uploads/service', 'public');
        }
        if ($data->save()) {
            return back()->with('success','Service saved successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Service::findOrfail($id);
        return view('admin.service.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'category'=>'required|numeric',
            'icon'=>'nullable|mimes:png,jpg|max:100|min:10',
            'description'=>'required|string',
            'meta_title'=>'required|string|max:255',
            'meta_description'=>'required|string',

        ]);
        $data=Service::findOrfail($id);
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->description=$request->description;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->icon->store('uploads/service', 'public');
        }
        if ($data->update()) {
            return back()->with('success','Service updated successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(Service::findOrfail($id)->delete())
       {
        return back()->with('success','Service deleted successfully !!');
             }else{
        return back()->with('error','Something Went Wrong !!');
             }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Setting::findOrfail(1);
        if($data)
        {
        return view('admin.setting.index',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name'=> 'required|string|max:255',
            'logo'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:130|min:10',
            'meta_title'=> 'required|string|max:255',
            'meta_description'=> 'required|string',
            'brief_description'=> 'required|string',
            'facebook'=> 'nullable|url',
            'twitter'=> 'nullable|url',
            'linkedin'=> 'nullable|url',
            'instagram'=> 'nullable|url',
            'contact_number'=> 'required|numeric',
            'contact_email'=> 'required|email',
            'address'=>'required|string'
        ]);
        $data= Setting::findOrfail(1);
        if($data)
        {
        $data->site_name=$request->site_name;
        if($request->site_status=="1")
        {
            $data->site_status=1;
        }
        else
        {
            $data->site_status=0;
        }
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->brief_description=$request->brief_description;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->linkedin=$request->linkedin;
        $data->instagram=$request->instagram;
        $data->contact_number=$request->contact_number;
        $data->contact_email=$request->contact_email;
        $data->address=$request->address;
        if($request->hasFile('logo'))
        {
            $data->logo = $request->logo->store('uploads/setting', 'public');
         }
        if($data->update())
        {
            return back()->with('success','Settings updated successfully !!');
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

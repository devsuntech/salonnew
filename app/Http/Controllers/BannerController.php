<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Banner::latest()->paginate(10);
        return view('admin.banner.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.create');
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
            'image'=>'required|mimes:png,jpg|max:100|min:10',
            'description'=>'required|string',
            'link'=>'required|string'
        ]);
        $data=new Banner;
        $data->link=$request->link;
        $data->description=$request->description;
        if($request->hasFile('image'))
        {
             $file = $request->file('image');
             $file_name = Str::random(5).'-'.time().'.'.$file->getClientOriginalExtension();
             $destinationPath = Storage::path('/public/uploads/banner');
             $file->move($destinationPath, $file_name);
             $data->image = $file_name;
         }
        if ($data->save()) {
            return back()->with('success','Banner saved successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Banner::findOrfail($id);
        return view('admin.banner.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'image'=>'required|mimes:png,jpg|max:100|min:10',
            'description'=>'required|string',
            'link'=>'required|string'
        ]);
        $data=Banner::findOrfail($id);
        $data->link=$request->link;
        $data->description=$request->description;
        if($request->hasFile('image'))
        {
             $file = $request->file('image');
             $file_name = Str::random(5).'-'.time().'.'.$file->getClientOriginalExtension();
             $destinationPath = Storage::path('/public/uploads/banner');
             $file->move($destinationPath, $file_name);
             $data->image = $file_name;
         }
        if ($data->update()) {
            return back()->with('success','Banner updated successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

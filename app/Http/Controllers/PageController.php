<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Page::latest()->paginate(10);
        return view('admin.page.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'name'=> 'required|string|max:255|unique:App\Models\Page',
            'title'=> 'required|string',
            'description'=> 'required|string',
            'header_img'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:130|min:10',
            'meta_title'=> 'required|string|max:255',
            'position'=>'nullable|numeric',
            'meta_description'=> 'required|string',
        ]);
        $data= new Page();
        $data->name=$request->name;
        $data->title=$request->title;
        $data->position=$request->position;
        $data->description=$request->description;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        if($request->hasFile('header_img'))
        {
            $data->header_img = $request->header_img->store('uploads/page', 'public');
         }
        if($data->save())
        {
            return back()->with('success','Page created successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Page::findOrfail($id);
        if($data)
        {
        return view('admin.page.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'title'=> 'required|string',
            'description'=> 'required|string',
            'header_img'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:130|min:10',
            'meta_title'=> 'required|string|max:255',
            'position'=>'nullable|numeric',
            'meta_description'=> 'required|string',
        ]);
        $data= Page::findOrfail($id);
        if($data)
        {
            $data->name=$request->name;
            $data->title=$request->title;
            //$data->position=$request->position;
            $data->description=$request->description;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;
        if($request->hasFile('header_img'))
        {
            $data->header_img = $request->icon->store('uploads/page', 'public');
         }
        if($data->update())
        {
            return back()->with('success','Page updated successfully !!');
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Page::findOrfail($id)->delete())
        {
            return back()->with('success','Page deleted successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }
}

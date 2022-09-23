<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=SubService::latest()->paginate(10);
        return view('admin.subservice.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subservice.create');
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
            'service'=>'required|numeric',
            'category'=>'required|numeric',
        ]);
        $data= new SubService();
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->service_id=$request->service;
        if($data->save())
        {
            return back()->with('success','Sub Service created successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\Http\Response
     */
    public function show(SubService $subService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= SubService::findOrfail($id);
        if($data)
        {
        return view('admin.subservice.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'service'=>'required|numeric',
            'category'=>'required|numeric',
        ]);
        $data= SubService::findOrfail($id);
        if($data)
        {
            $data->name=$request->name;
            $data->category_id=$request->category;
            $data->service_id=$request->service;

        if($data->update())
        {
            return back()->with('success','Sub Service updated successfully !!');
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
     * @param  \App\Models\SubService  $subService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(SubService::findOrfail($id)->delete())
        {
            return back()->with('success','Sub Service deleted successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }
}

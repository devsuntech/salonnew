<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Query::latest()->paginate(10);
        return view('admin.queries.index',compact('datas'));
    }

    /**
     * Display a listing of the resource for vendor.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendorQueries()
    {
        $id= Auth::user()->id;
        $datas= Query::where(['user_id'=>$id])->latest()->paginate(10);
        return view('admin.queries.vendorquery',compact('datas'));
    }
    
    /**
     * Display a listing of the resource for vendor.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendorCreateQueries(Request $request)
    {
        return view('admin.queries.vendoraddquery');
    }
    
    public function vendorStoreQueries(Request $request)
    {
        $request->validate([
            'description'=>'required|string',
        ]);
        $data=new Query;
        $data->user_id=Auth::user()->id;
        $data->name=Auth::user()->name;
        $data->mobile=Auth::user()->mobile;
        $data->subject='Salon Query';
        $data->message=$request->description;
        $data->created_at=Carbon::now(); 
        
        if ($data->save()) {
            return back()->with('success','Query send successfully !!');
        }else{
            return back()->with('error','Something Went Wrong !!');
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
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}

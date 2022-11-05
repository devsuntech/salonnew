<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Category::latest()->paginate(10);
        return view('admin.category.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=> 'required|string|max:255|unique:App\Models\Category',
            'description'=> 'required|string',
            'bg_color'=> 'required|string',
            'icon'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:130|min:10',
            'meta_title'=> 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
        ]);
        $data= new Category;
        $data->name = $request->name;
        $data->bg_color=$request->bg_color;
        $data->description=$request->description;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->icon->store('uploads/category', 'public');
         }
        if($data->save())
        {
            return back()->with('success','Category created successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Category::findOrfail($id);
        if($data)
        {
        return view('admin.category.edit',compact('data'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'bg_color'=> 'required|string',
            'description'=> 'required|string',
            'icon'=> 'nullable|mimes:png,jpg,jpeg,svg,gif|max:130|min:10',
            'meta_title'=> 'required|string|max:255',
            'meta_description'=> 'required|string',
        ]);
        $data= Category::findOrfail($id);
        if($data)
        {
            $data->name=$request->name;
            $data->bg_color=$request->bg_color;
            $data->description=$request->description;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;
            if($request->hasFile('icon'))
            {
                $data->icon = $request->icon->store('uploads/category', 'public');
            }
            if($data->update())
            {
                return back()->with('success','Category updated successfully !!');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Category::findOrfail($id)->delete())
        {
            return back()->with('success','Category deleted successfully !!');
        }
        else{
            return back()->with('error','Something went wrong!!');
        }


    }

}

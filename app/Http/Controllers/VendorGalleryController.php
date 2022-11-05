<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorGallery;
use Auth;
use Illuminate\Http\Request;

class VendorGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = VendorGallery::where('vendor_id', Auth::user()->vendor->id)->latest()->paginate(10);
        return view('vendor.gallery.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.gallery.create');
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
            'gallery_image' => 'required',
        ]);

        foreach ($request->gallery_image as $key => $value) {
            $data = new VendorGallery();
            $data->vendor_id = Auth::user()->vendor->id;
            $data->image = $value->store('uploads/gallery', 'public');
            $data->save();
        }

        return back()->with('success', 'Gallery Add successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorGallery  $vendorGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VendorGallery $vendorGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorGallery  $vendorGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VendorGallery::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first();
        if ($data) {
            return view('vendor.gallery.edit', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorGallery  $vendorGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gallery_image' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        if ($data = VendorGallery::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first()) {

            if ($request->hasFile('gallery_image')) {
                $data->image = $request->gallery_image->store('uploads/gallery', 'public');
            }
            if ($data->save()) {
                return back()->with('success', 'Gallery Update successfully !!');
            } else {
                return back()->with('error', 'Something went wrong!!');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorGallery  $vendorGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($data = VendorGallery::whereId($id)->whereVendorId(Auth::user()->vendor->id)->first()) {
            $data->delete();
            return back()->with('success', 'Gallery deleted successfully !!');
        } else {
            abort(404);
        }
    }
}

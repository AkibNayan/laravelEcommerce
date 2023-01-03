<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderby('name', 'asc')->get();
        return view('backend.pages.brand.manage', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = new Brand();

        $brands->name       = $request->brand_name;
        $brands->slug       = Str::slug($request->brand_name);

        if ($request->image )
        {
            $image = $request->file('image');
            $img = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $img);
            Image::make($image)->save($location);
            $brands->image = $img;
        }

        $brands->status     = $request->status;

        $brands->save();

        $notification = array(
            'message' => 'New Brand Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('brand.manage')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand_id = Brand::find($id);
        return view('backend.pages.brand.edit', compact('brand_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brands_id = Brand::find($id);
        $brands_id->name       = $request->brand_name;
        $brands_id->slug       = Str::slug($request->brand_name);

        if ($request->image)
        {
            if ( File::exists('backend/img/brands/' . $brands_id->image) )
            {
                File::delete('backend/img/brands/' . $brands_id->image);
            }
            $image = $request->file('image');
            $img = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $img);
            Image::make($image)->save($location);
            $brands_id->image = $img;

        }

        $brands_id->status    = $request->status;

        $brands_id->save();
        $notification = array(
            'message' => 'Brand Information Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('brand.manage')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand_del_id = Brand::find($id);
        if (!is_null($brand_del_id))
        {
            if( File::exists('backend/img/brands/' . $brand_del_id->image) )
            {
                File::delete('backend/img/brands/' . $brand_del_id->image);
            }

            $brand_del_id->delete();

            $notification = array(
                'message' => 'Brand Deleted Successfully',
                'alert-type' => 'error'
            );

            return redirect()->route('brand.manage')->with($notification);

        }
    }
}

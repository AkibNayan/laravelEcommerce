<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id', 'asc')->where('is_parent', 0)->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::orderby('title', 'asc')->where('is_parent', '0')->get();
        return view('backend.pages.category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $categories->title          = $request->title;
        $categories->slug           = Str::slug($request->title);
        $categories->description    = $request->description;

        if ($request->image)
        {
            $image = $request->file('image');
            $img = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $img);
            Image::make($image)->save($location);
            $categories->image = $img;
        }
        $categories->is_parent    = $request->is_parent;
        $categories->status    = $request->status;

        $categories->save();

        return redirect()->route('category.manage');

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
        $category = Category::find($id);
        if(!is_null($category))
        {
            $parents = Category::orderby('title', 'asc')->where('is_parent', '0')->get();
            return view('backend.pages.category.edit', compact('parents', 'category'));
        }
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
        $category_id = Category::find($id);
        $category_id->title          = $request->title;
        $category_id->slug           = Str::slug($request->title);
        $category_id->description    = $request->description;

        if (!is_null($category_id)) {
            //If Category Image Exists
            if ( File::exists('backend/img/category/' . $category_id->image) )
            {
                File::delete('backend/img/category/' . $category_id->image);
                if ($request->image) {
                    $image = $request->file('image');
                    $img = time() . "." . $image->getClientOriginalExtension();
                    $location = public_path('backend/img/category/' . $img);
                    Image::make($image)->save($location);
                    $category_id->image = $img;
                }
            }
            else
            {
                if ($request->image) {
                    $image = $request->file('image');
                    $img = time() . "." . $image->getClientOriginalExtension();
                    $location = public_path('backend/img/category/' . $img);
                    Image::make($image)->save($location);
                    $category_id->image = $img;
                }
            }
            $category_id->is_parent    = $request->is_parent;
            $category_id->status    = $request->status;

            $category_id->save();

            return redirect()->route('category.manage');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_id = Category::find($id);
        if(File::exists('backend/img/category/' . $delete_id->image))
        {
            File::delete('backend/img/category/' . $delete_id->image);
        }

        $delete_id->delete();
        return redirect()->route('category.manage');
    }
}

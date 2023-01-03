<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Division;
use App\Models\District;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $products = Product::orderBy('id', 'desc')->where('status', 1)->take(9)->get();
        $onsaleProducts = Product::orderBy('id', 'desc')->where('is_featured', 1)->take(9)->get();
        return view('frontend.pages.homepage', compact('products', 'onsaleProducts'));
    }

    /**
     * Display a listing of the All Products page.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        $products = Product::orderBy('id', 'desc')->where('status', 1)->get();
        return view('frontend.pages.allproducts', compact('products'));
    }

    /**
     * Display a listing of the Product Details page.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails($slug)
    {
        $productDetails = Product::where('slug', $slug)->first();
        // dd($productDetails);
        // exit();
        if (!is_null($productDetails))
        {
            return view('frontend.pages.details', compact('productDetails'));
        }
        else
        {
            return redirect()->back();
        }

    }

    /**
     * Display a listing of the Primary Category product listing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pcategory($id)
    {
        $pcategory = Category::find($id);
        if (!is_null($pcategory)) {
            return view('frontend.pages.primarycategory', compact('pcategory'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the Sub Category Product Listing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!is_null($category))
        {
            return view('frontend.pages.category', compact('category'));
        }
        else
        {
            return redirect()->back();
        }

    }

    /**
     * Display a listing of the Product Search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orWhere('title', 'like', '%' . $search . '%')
        ->orWhere('short_description', 'like', '%' . $search . '%')
        ->orWhere('tags', 'like', '%' . $search . '%')
        ->orderBy('id', 'desc')->get();

        return view('frontend.pages.search', compact('search', 'products'));
    }

    /**
     * Display a listing of the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {

    }

    /**
     * Display a listing of the checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $cartItems = Cart::orderBy('id', 'desc')->get();
        $divisions = Division::orderBy('id', 'asc')->get();
        $districts = District::orderBy('id', 'asc')->get();
        return view('frontend.pages.checkout', compact('cartItems', 'divisions', 'districts'));
    }

    /**
     * Show the form for creating Login & Register Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('frontend.pages.login');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

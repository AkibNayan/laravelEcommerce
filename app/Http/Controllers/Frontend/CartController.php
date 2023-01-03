<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::orderBy('id', 'desc')->where('order_id', NULL)->get();
        return view('frontend.pages.cart', compact('cartItems'));
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
        if (Auth::check())
        {
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->where('order_id', NULL)->first();
        }
        else
        {
            $cart = Cart::where('ip_address', request()->ip())->where('product_id', $request->product_id)->where('order_id', NULL)->first();
        }

        if (!is_null($cart))
        {
            $cart->increment('quantity');

            $notification = array(
                'message' => 'Another Quantity Added',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
        else
        {
            $cart = new Cart();
            if (Auth::check())
            {
                $cart->user_id = Auth::id();
            }
            else{
                $cart->ip_address = $request->ip();
            }
            $cart->product_id = $request->product_id;

            if (!is_null($cart->product->offer_price))
                $cart->unit_price = $cart->product->offer_price;
            else
                $cart->unit_price = $cart->product->regular_price;


            $cart->save();
            $notification = array(
                'message' => 'Item Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

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
        $cart = Cart::find($id);
        if (!is_null( $cart ))
        {
            $cart->quantity = $request->quantity;
        }

        $cart->save();
        $notification = array(
            'message' => 'Item Information Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!is_null( $cart ))
        {
            $cart->delete();
        }
        else
        {
            $notification = array(
                'message' => 'Item Deleted Successfully',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }
}

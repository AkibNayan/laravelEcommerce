<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'unit_price',
        'order_id',
        'user_id',
        'ip_address',
    ];

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that owns the cart.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the cart.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //If we use static function, then we can take data direct from Models.
    //Total Carts Product Details functionality
    public static function totalCart()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
        } else {
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }
        return $carts;
    }

    // Total items/Quantity added in the cart
    public static function totalItems()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
        } else {
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }

        $total_items = 0;

        foreach ($carts as $cart) {
            $total_items += $cart->quantity;
        }

        return $total_items;
    }

    // To return total price in the cart
    public static function totalPrice()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->where('order_id', NULL)->get();
        } else {
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }

        $total_price = 0;
        foreach ($carts as $cart) {
            if (!is_null($cart->product->offer_price)) {
                $total_price += $cart->product->offer_price * $cart->quantity;
            } else {
                $total_price += $cart->product->regular_price * $cart->quantity;
            }
        }

        return $total_price;
    }
}

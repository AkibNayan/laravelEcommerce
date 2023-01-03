<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'division_id',
        'district_id',
        'country',
        'message',
        'amount',
        'transaction_id',
        'currency',
        'is_paid',
        'status'
    ];

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the division that owns the district.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    /**
     * Get the district that owns the district.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    /**
     * Get the cart that owns the district.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    /**
     * Get the product that owns the district.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

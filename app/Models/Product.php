<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'brand_id',
        'category_id',
        'quantity',
        'regular_price',
        'offer_price',
        'is_featured',
        'status',
        'tags',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * Get the images that owns the productImage.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}

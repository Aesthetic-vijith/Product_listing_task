<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_code', 'product_slug', 'category_id', 'subcategory_id', 'brand_id',
        'product_original_price', 'product_has_discount', 'product_discount_price', 'product_quantity',
        'product_image', 'product_status', 'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

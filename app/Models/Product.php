<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'shop_id',
        'name',
        'QTY',
        'price',
        'image',
        'isActive',
        'description',
    ];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function categories()
    {
    return $this->belongsToMany(Category::class, 'product_category');
    }
}

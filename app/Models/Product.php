<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    function orders() {
        return $this->belongsToMany(Order::class,'orderdetails','product_id','order_id')->withPivot('priceEach','buy_quantity');
    }

    function getNameImage(){
        return '/storage/images/' .ltrim($this->image, '/public/images/');
    }

}

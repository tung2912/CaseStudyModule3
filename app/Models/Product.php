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

    function getNameImage(){
        return '/storage/images/' .ltrim($this->image, '/public/images/');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    function customer() {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class,'orderdetails','order_id','product_id')->withPivot('priceEach','buy_quantity');
    }
}

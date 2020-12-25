<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about() {
        return view('customers.about');
    }

    public function contact() {
        return view('customers.contact');
    }
    public function allProducts() {
        $categories = Category::all();
        return view('customers.allProducts',compact('categories'));
    }
}

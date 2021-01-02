<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function about() {
        return view('customers.about');
    }

    public function contact() {
        return view('customers.contact');
    }

    public function showIndex() {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderBy('sold','DESC')->limit(16)->get();
        return view('index',compact('products','brands','categories'));
    }

    public function allProducts() {
        $categories = Category::all();
        $brands = Brand::all();
        return view('customers.allProducts',compact('categories','brands'));
    }

    public function searchProduct(Request $request) {
        $searchValue = $request->searchValue ;
        // dd($searchValue);
        $products = Product::where('name','LIKE',"%$searchValue%")->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('customers.categories.searchProducts',compact('products','brands','categories'));
    }

    public function showProductByBrand($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('brand_id',$id)->get();
        $brand = Brand::where('id',$id)->first();
        return view('customers.categories.category1',compact('products','brands','brand','categories'));
    }

    public function showProductByCategory($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('category_id',$id)->get();
        $category = Category::where('id',$id)->first();
        return view('customers.categories.category1',compact('products','categories','category','brands'));
    }

    public function showProductDetail($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $product = $this->productService->findByID($id);
        $product->views +=1;
        $product->save();
        return view('customers.productDetails.productDetails',compact('product','categories','brands'));
    }
}

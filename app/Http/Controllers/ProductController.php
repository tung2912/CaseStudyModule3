<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        return view('admin.products.list',compact('products','categories','brands'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.add',compact('products','categories','brands'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = new Product();
        $this->productService->add($request,$product);
        return redirect()->route('products.index')->with("addSuccess","Successfully Added");
    }

    public function edit($id)
    {
        $product = $this->productService->findByID($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }

    public function update(CreateProductRequest $request, $id)
    {
        $product = $this->productService->findByID($id);
        $this->productService->update($request, $product);
        return redirect()->route('products.index')->with('updateSuccess','Successfully Updated');
    }

    public function destroy($id)
    {
        $product = $this->productService->findByID($id);
        Storage::delete($product->image1);
        Storage::delete($product->image2);
        $product->delete();
        return redirect()->route('products.index')->with('deleteSuccess','Successfully deleted');
    }

//   client using

    public function showIndex() {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderBy('sold','DESC')->limit(16)->get();
        return view('index',compact('products','brands','categories'));
    }

    public function showProductDetail($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $product = $this->productService->findByID($id);
        $product->views +=1;
        $product->save();
        return view('customers.productDetails.productDetails',compact('product','categories','brands'));
    }

    public function showProductByCategory($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('category_id',$id)->get();
        $category = Category::where('id',$id)->first();
        return view('customers.categories.category1',compact('products','categories','category','brands'));
    }

    public function showProductByBrand($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('brand_id',$id)->get();
        $brand = Brand::where('id',$id)->first();
        return view('customers.categories.category1',compact('products','brands','brand','categories'));
    }

    public function searchProductByName(Request $request) {
        $searchValue = $request->searchValue;
        $products = Product::where('name','like',"%$searchValue%")->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('customers.categories.searchProducts',compact('products','brands','categories'));

    }
}

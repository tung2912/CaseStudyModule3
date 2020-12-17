<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

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
        $products = Product::all();
        return view('admin.products.list',compact('products','categories'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.add',compact('products','categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = new Product();
        $this->productService->add($request,$product);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productService->findByID($id);
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(CreateProductRequest $request, $id)
    {
        $product = $this->productService->findByID($id);
        $this->productService->update($request, $product);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = $this->productService->findByID($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}

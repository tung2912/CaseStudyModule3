<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'showIndex'])->name('client.showIndex');
Route::get('/productDetails',function (){
    return view('customers.productDetails.productDetails');
});
Route::get('/productDetails/{product_id}',[ProductController::class,'showProductDetail'])->name('client.showProductDetails');
Route::get('/about',[HomeController::class,'about'])->name('home.about');
Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');
Route::get('/allProducts',[HomeController::class,'allProducts'])->name('home.allProducts');
Route::prefix('categories')->group(function (){
    Route::get('/category/{category_id}',[ProductController::class,'showProductByCategory'])->name('category.show');
    Route::get('/brand/{brand_id}',[ProductController::class,'showProductByBrand'])->name('brand.show');
    Route::post('searchProduct',[ProductController::class,'searchProductByName'])->name('category.search');
});


Route::get('/login',[LoginController::class,'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('admin.login');
Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/',[DashboardController::class,'showDashboard'])->name('admin.dashboard');

    Route::prefix('users')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::post('/create',[UserController::class,'store'])->name('users.store');
        Route::get('/edit/{user_id}',[UserController::class,'edit'])->name('users.edit');
        Route::post('/edit/{user_id}',[UserController::class,'update'])->name('users.update');
        Route::get('/delete/{user_id}',[UserController::class,'destroy'])->name('users.delete');
        Route::get('/show/{user_id}',[UserController::class,'show'])->name('users.show');
    });

    Route::prefix('products')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('products.index');
        Route::get('/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/create',[ProductController::class,'store'])->name('products.store');
        Route::get('/edit/{product_id}',[ProductController::class,'edit'])->name('products.edit');
        Route::post('/edit/{product_id}',[ProductController::class,'update'])->name('products.update');
        Route::get('delete/{product_id}',[ProductController::class,'destroy'])->name('products.delete');
    });

    Route::prefix('categories')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/create',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/edit/{category_id}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::post('edit/{category_id}',[CategoryController::class,'update'])->name('categories.update');
        Route::get('/delete/{category_id}',[CategoryController::class,'destroy'])->name('categories.delete');
    });

    Route::prefix('brands')->group(function (){
        Route::get('/',[BrandController::class,'index'])->name('brands.index');
        Route::get('/create',[BrandController::class,'create'])->name('brands.create');
        Route::post('/create',[BrandController::class,'store'])->name('brands.store');
        Route::get('/edit/{brand_id}',[BrandController::class,'edit'])->name('brands.edit');
        Route::post('edit/{brand_id}',[BrandController::class,'update'])->name('brands.update');
        Route::get('/delete/{brand_id}',[BrandController::class,'destroy'])->name('brands.delete');
    });

    Route::prefix('customers')->group(function (){
        Route::get('/',[CustomerController::class,'index'])->name('customers.index');
        Route::get('/show/{customer_id}',[CustomerController::class,'show'])->name('customers.show');
        Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
        Route::post('/create',[CustomerController::class,'store'])->name('customers.store');
        Route::get('/edit/{customer_id}',[CustomerController::class,'edit'])->name('customers.edit');
        Route::post('edit/{customer_id}',[CustomerController::class,'update'])->name('customers.update');
        Route::get('/delete/{customer_id}',[CustomerController::class,'destroy'])->name('customers.delete');
    });

    Route::prefix('orders')->group(function (){
        Route::get('/',[OrderController::class,'index'])->name('orders.index');
        Route::get('/show/{order_id}',[OrderController::class,'show'])->name('orders.show');
        Route::get('/create',[OrderController::class,'create'])->name('orders.create');
        Route::post('/create',[OrderController::class,'store'])->name('orders.store');
        Route::get('/edit/{order_id}',[OrderController::class,'edit'])->name('orders.edit');
        Route::post('edit/{order_id}',[OrderController::class,'update'])->name('orders.update');
        Route::get('/delete/{order_id}',[OrderController::class,'destroy'])->name('orders.delete');
        Route::get('/confirm/{order_id}',[OrderController::class,'confirmOrder'])->name('orders.confirm');
    });
});

//Route::get('/cart',function (){
//  return view('customers.cart.list');
//});
Route::prefix('cart')->group(function (){
    Route::get('/',[CartController::class,'showCart'])->name('cart.showCart');
    Route::get('/{id_product}/add-to-cart',[CartController::class,'addToCart'])->name('cart.addToCart');
    Route::get('/{id_product}/delete',[CartController::class,'destroy'])->name('cart.delete');
    Route::get('/remove',[CartController::class,'removeCart'])->name('cart.remove');
    Route::get('{id_product}/decrease',[CartController::class,'decrease'])->name('cart.decrease');
    Route::get('/checkout',[CartController::class,'checkOut'])->name('cart.checkout');
    Route::post('/checkout',[CartController::class,'finishCheckOut'])->name('cart.finishCheckout');
});

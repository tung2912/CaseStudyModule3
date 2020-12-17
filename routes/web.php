<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/',function (){
    return view('index');
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

    Route::prefix('customers')->group(function (){
        Route::get('/',[CustomerController::class,'index'])->name('customers.index');
        Route::get('/create',[CategoryController::class,'create'])->name('customers.create');
        Route::post('/create',[CategoryController::class,'store'])->name('customers.store');
        Route::get('/edit/{category_id}',[CategoryController::class,'edit'])->name('customers.edit');
        Route::post('edit/{category_id}',[CategoryController::class,'update'])->name('customers.update');
        Route::get('/delete/{category_id}',[CategoryController::class,'destroy'])->name('customers.delete');
    });
});

<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\checkoutRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($idProduct){
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart') ? session('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product);
        session()->put('cart',$cart);
        return back()->with('successAddToCart','Thêm thành công');
    }

    public function showCart(){
        $cart = session('cart');
        $brands = Brand::all();
        $categories = Category::all();
        return view('customers.cart.list',compact('cart','brands','categories'));
    }

    public function destroy($idProduct){
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart') ? session('cart') :null;
        $cart = new Cart($oldCart);
        $cart->delete($product);
        if(count($cart->items)>0)
        {
            session()->put('cart',$cart);
        }
        else
        {
            session()->forget('cart');
        }
        return back()->with('successDelete','Xóa thành công');
    }

    public function decrease($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart') ? session('cart') :null;
        $cart = new Cart($oldCart);
        $cart->decrease($product);
        if(count($cart->items)>0)
        {
            session()->put('cart',$cart);
        }
        else
        {
            session()->forget('cart');
        }
        return back()->with('successDecrease','Cập nhật thành công');
    }

//    public function update($idProduct,Request $request) {
//        $product = Product::findOrFail($idProduct);
//        $requestQty = $request->requestQty;
//        $oldCart = session('cart') ? session('cart') : null;
//        $cart = new Cart($oldCart);
//        $cart->update($requestQty, $product);
//        session()->put('cart', $cart);
//        return back()->with('successUpdate', 'Cập nhật thành công');
//    }

    public function removeCart(){
        session()->forget('cart');
        return back()->with('successDelete','Xóa thành công');
    }

    public function checkOut(){
        $products = session('cart') ? session('cart'):null;
        return view('customers.cart.checkout',compact('products'));
    }

    public function finishCheckOut(checkoutRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->status = "1";
        $order->notes = $request->notes;
        $order->save();
        $order_id = $order->id;

        $oldCart = session('cart') ? session('cart') :null;
        $cart = new Cart($oldCart);
        foreach ($cart->items as $item)
        {
            $product_id = $item['product']->id;
            $buy_quantity = $item['totalQty'];
            $price_each = $item['product']->price;
            DB::table('orderdetails')->insert([
                'order_id'=>$order_id,
                'product_id'=>$product_id,
                'buy_quantity'=>$buy_quantity,
                'priceEach'=>$price_each
            ]);
//            $product = Product::find($item['product']->id);
//            $product->decrement('instock',$item['totalQty']);
//            $product->increment('sold',$item['totalQty']);

        }
        session()->forget('cart');
        return redirect()->route('cart.showCart')->with('checkOutSuccess','Bạn đã đặt hàng thành công');

    }
}

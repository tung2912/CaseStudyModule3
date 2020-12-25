<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $customers = Customer::all();
        $orders = Order::all();
        return view('admin.orders.list',compact('orders','customers'));
    }

    public function show($id) {
        $order = $this->orderService->findByID($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.orders.details',compact('order','products','customers'));
    }

    public function confirmOrder($id) {
        $order = Order::findOrFail($id);
        if ($order->status == 1) {
            $order->status = 2;
            $order->save();
            foreach ($order->products as $item)
            {
                $product = Product::findOrFail($item->id);
                $qty = $item->pivot->buy_quantity;
                $product->decrement('instock',"$qty");
                $product->increment('sold',"$qty");
                $product->save();
            }
            return redirect()->route('orders.index')->with('successChangeStatus','Chang status successfully');
        }
        return redirect()->route('orders.index');
    }
}

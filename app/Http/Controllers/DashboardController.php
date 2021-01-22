<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function showDashboard() {
        $startOfMoth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();
        $orderOfMoth  = Order::whereBetween('created_at',[$startOfMoth,$endOfDay])->get()->count();
        $orderOfDay = Order::whereBetween('created_at',[$startOfDay,$endOfDay])->get()->count();
        return view('admin.layout.dashboard',compact('orderOfMonth','orderOfDay'));
    }
}

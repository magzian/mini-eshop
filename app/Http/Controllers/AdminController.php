<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index(){

        $productCount = Product::count();
        $orderCount = Order::count();
        $revenue = Order::sum('total');

        return view('admin', compact('productCount', 'orderCount', 'revenue'));
    }

    
}

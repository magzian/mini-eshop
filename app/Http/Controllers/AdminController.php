<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index(){

        $productCount = Product::count();
        $orderCount = Order::count();
        $revenue = Order::sum('total');

        $bestProducts = DB::select("
        SELECT 
            p.id, 
            p.name, 
            SUM(oi.qty) AS total_sold
        FROM products p
        JOIN order_items oi ON p.id = oi.product_id
        JOIN orders o ON o.id = oi.order_id
        GROUP BY p.id, p.name
        ORDER BY total_sold DESC
        LIMIT 5
        ");

        return view('admin', compact('productCount', 'orderCount', 'revenue', 'bestProducts'));
    }

    

    
}

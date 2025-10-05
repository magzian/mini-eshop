<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(){
        $products = Product::where('stock', '>', 0)->latest()->paginate(12);
        return view('catalog.index', compact('products')); 


    }

    public function show(Product $product){
        return view('catalog.show', compact('product'));
    }
}
 
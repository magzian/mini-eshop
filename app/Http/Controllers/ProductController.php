<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }



    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
            
    }

    public function edit(Product $product){
        return view('admin.products.edit', compact('product'));
    }
    
    public function update(UpdateProductRequest $request, Product $product){
        $product->update($request->validated());
        return redirect()->route('admin.products.index')
        ->with('success', 'Product updated successfully.');
    }
    

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}

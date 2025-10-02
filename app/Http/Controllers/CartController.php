<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $lineTotal = $product->price * $qty;
                $cartItems[] = [
                    'product' => $product,
                    'qty' => $qty,
                    'line_total' => $lineTotal,
                ];
                $total += $lineTotal;
            }
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $qty = $request->input('qty', 1);
        
        if ($qty > $product->stock) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart = session()->get('cart', []);
        $currentQty = $cart[$product->id] ?? 0;
        
        if ($currentQty + $qty > $product->stock) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart[$product->id] = $currentQty + $qty;
        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}

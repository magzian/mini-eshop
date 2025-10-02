<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
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

        if (empty($cartItems)) {
            return redirect()->route('catalog.index')
                ->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('catalog.index')
                ->with('error', 'Your cart is empty.');
        }

        try {
            DB::beginTransaction();

            $total = 0;
            $orderData = [];

            foreach ($cart as $productId => $qty) {
                $product = Product::lockForUpdate()->find($productId);
                
                if (!$product) {
                    throw new \Exception("Product not found.");
                }

                if ($product->stock < $qty) {
                    throw new \Exception("Insufficient stock for {$product->name}. Available: {$product->stock}, Requested: {$qty}");
                }

                $lineTotal = $product->price * $qty;
                $orderData[] = [
                    'product' => $product,
                    'qty' => $qty,
                    'unit_price' => $product->price,
                    'line_total' => $lineTotal,
                ];
                $total += $lineTotal;

                $product->decrement('stock', $qty);
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
            ]);

            foreach ($orderData as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'qty' => $item['qty'],
                    'unit_price' => $item['unit_price'],
                    'line_total' => $item['line_total'],
                ]);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('checkout.success', $order)
                ->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}

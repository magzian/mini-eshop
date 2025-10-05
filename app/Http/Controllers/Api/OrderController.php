<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB; 

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request){
        try {
            DB::beginTransaction();

            $total = 0;
            $orderData = [];

            foreach($request->items as $item) {
                $product = Product::lockForUpdate()->find($item['product_id']);

                if (!$product) {
                    return response()-> json([
                        'message' => 'Product not found.',
                        'product_id' => $item['product_id']
                    ], 404);
                }

                if ($product->stock < $item['qty']) {
                    return response()->json([
                        'message' => 'Insufficient stock for `{$product->name}`',
                        'available' => $product->stock,
                        'requested' => $item['qty'],
                    ], 422);
                }

                $lineTotal = $product->price * $item['qty'];
                $orderData[] = [
                    'product' => $product,
                    'qty' => $item['qty'],
                    'unit_price' => $product->price,
                    'line_total' => $lineTotal,
                ];

                $total += $lineTotal;

                $product->decrement('stock', $item['qty']);
            }

            $order = Order::create([
                'user_id' => auth('sanctum')->id(),
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

            $order->load('items.product');

            return response()->json([
                'message' => 'Order created successfully',
                'order' => [
                    'id' => $order->id,
                    'total' => $order->total,
                    'created_at' => $order->created_at,
                    'items' => $order->items->map(fn($item) => [
                        'product_id' => $item->product_id,
                        'product_name' => $item->product->name,
                        'qty' => $item->qty,
                        'unit_price' => $item->unit_price,
                        'line_total' => $item->line_total,
                    ]),
                ],
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Order creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

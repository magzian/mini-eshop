<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = User::where('isAdmin', false)->get();
        $products = Product::all();

        $ordersPerDay = [
            0 => 5, 1 => 4, 2 => 6, 3 => 0,
            4 => 5, 5 => 3, 6 => 0, 7 => 4,
            8 => 0, 9 => 0,
        ];

         foreach ($ordersPerDay as $daysAgo => $orderCount) {
            for($i=0; $i < $orderCount; $i++){

                $customer = $customers->random();
                $orderDate = Carbon::now()->subDays($daysAgo)->setTime(rand(8,20), rand(0, 59), rand(0,59));
                $itemCount = rand(1, 5);
                $orderTotal = 0;

                $order = Order::create([
                    'user_id' => $customer->id,
                    'total' => 0,
                    'created_at' => $orderDate,
                    'updated_at' => $orderDate,
                ]);

                $usedProductIds = [];

                for ($j = 0; $j < $itemCount; $j++){
                    do {
                        $product = $products->random();
                    } while (in_array($product->id, $usedProductIds));

                    $usedProductIds[] = $product->id;

                    $qty = $product->id <= 5 ? rand(2,5) : rand(1,3);
                    $unitPrice = $product->price;
                    $lineTotal = $unitPrice * $qty;
                    $orderTotal += $lineTotal;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'qty' => $qty,
                        'unit_price' => $unitPrice,
                        'line_total' => $lineTotal,
                        'created_at' => $orderDate,
                        'updated_at' => $orderDate,
                    ]);

                    $product->decrement('stock', $qty);
                }

            $order->update(['total' => $orderTotal]);
         }
    }
    }
}
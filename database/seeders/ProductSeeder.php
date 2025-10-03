<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $productsData = [
            ['name' => 'Laptop Pro 15"', 'price' => 1299.99, 'stock' => 50, 'description' => 'High-performance laptop with 16GB RAM and 512GB SSD.'],
            ['name' => 'Wireless Mouse', 'price' => 29.99, 'stock' => 200, 'description' => 'Ergonomic wireless mouse with long battery life.'],
            ['name' => 'Mechanical Keyboard', 'price' => 149.99, 'stock' => 100, 'description' => 'Premium mechanical keyboard with RGB lighting.'],
            ['name' => 'USB-C Hub', 'price' => 49.99, 'stock' => 150, 'description' => '7-in-1 USB-C hub with HDMI and card reader.'],
            ['name' => 'Webcam HD', 'price' => 79.99, 'stock' => 80, 'description' => '1080p HD webcam with built-in microphone.'],
            ['name' => 'Phone Stand', 'price' => 19.99, 'stock' => 300, 'description' => 'Adjustable aluminum phone stand.'],
            ['name' => 'Laptop Bag', 'price' => 59.99, 'stock' => 120, 'description' => 'Waterproof laptop bag with multiple compartments.'],
            ['name' => 'External SSD 1TB', 'price' => 129.99, 'stock' => 60, 'description' => 'Portable external SSD with USB 3.2 Gen 2.'],
            ['name' => 'Bluetooth Headphones', 'price' => 199.99, 'stock' => 90, 'description' => 'Noise-cancelling Bluetooth headphones.'],
            ['name' => 'Monitor 27"', 'price' => 349.99, 'stock' => 40, 'description' => '27-inch 4K UHD monitor with HDR.'],
            ['name' => 'Desk Lamp LED', 'price' => 39.99, 'stock' => 180, 'description' => 'Adjustable LED desk lamp with touch control.'],
            ['name' => 'Cable Organizer', 'price' => 14.99, 'stock' => 250, 'description' => 'Desktop cable management organizer.'],
            ['name' => 'Laptop Stand', 'price' => 44.99, 'stock' => 140, 'description' => 'Ergonomic aluminum laptop stand.'],
            ['name' => 'Graphics Tablet', 'price' => 89.99, 'stock' => 70, 'description' => 'Digital drawing tablet with stylus.'],
            ['name' => 'Portable Charger', 'price' => 34.99, 'stock' => 220, 'description' => '20000mAh portable power bank.'],
        ];

        foreach($productsData as $productsData){
            Product::create($productsData);
        }
    }
}

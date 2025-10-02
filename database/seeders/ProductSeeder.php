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
            Product::create([
            'name' => 'Laptop',
            'price' => 999.99,
            'stock' => 10,
            'description' => 'High-performance laptop for professionals.',
        ]);

        Product::create([
            'name' => 'Wireless Mouse',
            'price' => 29.99,
            'stock' => 50,
            'description' => 'Ergonomic wireless mouse with long battery life.',
        ]);

        Product::create([
            'name' => 'Mechanical Keyboard',
            'price' => 149.99,
            'stock' => 25,
            'description' => 'Premium mechanical keyboard with RGB lighting.',
        ]);
    }
}

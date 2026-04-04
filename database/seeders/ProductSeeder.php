<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Product::factory(10)->create();
        Product::factory()->create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 19.99,
            'stock' => 100,
            'user_id' => 2,
        ]);
        Product::factory()->create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 29.99,
            'stock' => 50,
            'user_id' => 2,
        ]);
        Product::factory()->create([
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
            'price' => 39.99,
            'stock' => 25,
            'user_id' => 2,
        ]);



    }
}

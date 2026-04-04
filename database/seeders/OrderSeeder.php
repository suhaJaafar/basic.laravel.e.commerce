<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Order::factory(10)->create();
        Order::factory()->create([
            'user_id' => 3,
            'product_ids' => [1, 2],
            'quantity' => 2,
            'total_price' => 49.98,
        ]);
        Order::factory()->create([
            'user_id' => 3,
            'product_ids' => [2, 3],
            'quantity' => 2,
            'total_price' => 69.98,
        ]);
        Order::factory()->create([
            'user_id' => 3,
            'product_ids' => [1, 3],
            'quantity' => 2,
            'total_price' => 59.98,
        ]);

    }
}

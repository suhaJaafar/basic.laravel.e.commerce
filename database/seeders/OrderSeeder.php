<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = '7a983d70-0c74-479c-87cd-eea44b33fc03';
        $user = User::findOrFail($id);
        // \App\Models\Order::factory(10)->create();
        Order::factory()->create([
            'user_id' => $user->id,
            'product_ids' => [1, 2],
            'quantity' => 2,
            'total_price' => 49.98,
        ]);
        Order::factory()->create([
            'user_id' => $user->id,
            'product_ids' => [2, 3],
            'quantity' => 2,
            'total_price' => 69.98,
        ]);
        Order::factory()->create([
            'user_id' => $user->id,
            'product_ids' => [1, 3],
            'quantity' => 2,
            'total_price' => 59.98,
        ]);

    }
}

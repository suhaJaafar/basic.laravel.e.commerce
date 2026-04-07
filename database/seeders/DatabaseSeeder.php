<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => '7a983d70-0c74-479c-87cd-eea44b33fc01',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'id' => '7a983d70-0c74-479c-87cd-eea44b33fc02',
            'name' => 'Provider User',
            'email' => 'provider@example.com',
            'password' => bcrypt('password'),
            'role' => 'provider',
        ]);
        User::factory()->create([
            'id' => '7a983d70-0c74-479c-87cd-eea44b33fc03',
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);
        // after be sure that users are created, we can create products and orders
        $this->call([
            ProductSeeder::class,
            OrderSeeder::class,
        ]);

    }
}

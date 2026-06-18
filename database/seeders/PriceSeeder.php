<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prices')->insert([
            [
                'price' => 999.00,
                'size_id' => 1,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'price' => 1099.00,
                'size_id' => 2,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'price' => 1199.00,
                'size_id' => 3,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'price' => 1499.00,
                'size_id' => 1,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'price' => 1599.00,
                'size_id' => 2,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'price' => 2499.00,
                'size_id' => 2,
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'price' => 2699.00,
                'size_id' => 4,
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

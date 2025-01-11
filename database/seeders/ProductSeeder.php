<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_name' => 'Laptop',
                'price' => 12000000,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_name' => 'Smartphone',
                'price' => 8000000,
                'stock' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_name' => 'Headphones',
                'price' => 500000,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

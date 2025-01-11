<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaction_details')->insert([
            [
                'transaction_id' => 1,
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'price' => 12000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 2,
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_id' => 2,
                'quantity' => 2,
                'price' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 3,
                'date' => now(),
                'branch_id' => 1,
                'employee_id' => 1,
                'product_id' => 3,
                'quantity' => 10,
                'price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

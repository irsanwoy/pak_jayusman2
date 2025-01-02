<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

<<<<<<< HEAD
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
=======
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            BranchSeeder::class,
            EmployeeSeeder::class,
            ProductSeeder::class,
            TransactionSeeder::class,
            TransactionDetailSeeder::class,
        ]);

>>>>>>> eca7708e3d429ef9e9f3c1657ccd09d3d5a77324
    }
}

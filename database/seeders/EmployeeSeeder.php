<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        

        // // Gudang (Gudang Role)
        // $warehouse = Employee::create([
        //     'name' => 'Dewi Kusuma N',
        //     'position' => 'Gudang',  // Ganti dengan nilai yang sesuai enum
        //     'branch_id' => 2,  // Mengacu ke cabang dengan id 2
        // ]);
        // $warehouseUser = User::create([
        //     'name' => 'Dewi Kusuma N',
        //     'email' => 'dewi.kusuma24@domain.com',
        //     'password' => bcrypt('password123'),
        // ]);
        // $warehouseUser->assignRole('Gudang');
        // Menambahkan data pegawai
        // Employee::create([
        //     'name' => 'Budi Santoso',
        //     'position' => 'Store Manager',  // Ganti dengan nilai yang sesuai enum
        //     'branch_id' => 1,  // Mengacu ke cabang dengan id 1
        // ]);

        // Employee::create([
        //     'name' => 'Siti Nurhaliza',
        //     'position' => 'Cashier',  // Ganti dengan nilai yang sesuai enum
        //     'branch_id' => 2,  // Mengacu ke cabang dengan id 2
        // ]);

        // Employee::create([
        //     'name' => 'Rudi Pratama',
        //     'position' => 'Supervisor',  // Ganti dengan nilai yang sesuai enum
        //     'branch_id' => 3,  // Mengacu ke cabang dengan id 3
        // ]);
    }
}

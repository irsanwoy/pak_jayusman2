<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data pegawai
        Employee::create([
            'name' => 'Budi Santoso',
            'position' => 'Store Manager',  // Ganti dengan nilai yang sesuai enum
            'branch_id' => 1,  // Mengacu ke cabang dengan id 1
        ]);

        Employee::create([
            'name' => 'Siti Nurhaliza',
            'position' => 'Cashier',  // Ganti dengan nilai yang sesuai enum
            'branch_id' => 2,  // Mengacu ke cabang dengan id 2
        ]);

        Employee::create([
            'name' => 'Rudi Pratama',
            'position' => 'Supervisor',  // Ganti dengan nilai yang sesuai enum
            'branch_id' => 3,  // Mengacu ke cabang dengan id 3
        ]);
    }
}

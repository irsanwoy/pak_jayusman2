<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        $roles = ['Admin', 'Kasir', 'Supervisor', 'Manajer Toko', 'Gudang'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        $permissions = [
            'create-product', 'read-product', 'update-product', 'delete-product',
            'create-cabang', 'read-cabang', 'update-cabang', 'delete-cabang',
            'create-pegawai', 'read-pegawai', 'update-pegawai', 'delete-pegawai',
            'create-transaksi', 'read-transaksi', 'update-transaksi', 'delete-transaksi',
            'read-stok', 'update-stok',
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::findByName('Admin');
        $adminRole->givePermissionTo(Permission::all());  

        $kasirRole = Role::findByName('Kasir');
        $kasirRole->givePermissionTo(['create-transaksi', 'read-transaksi']);  

        $supervisorRole = Role::findByName('Supervisor');
        $supervisorRole->givePermissionTo(['read-transaksi', 'read-stok', 'update-stok']);  

        $manajerTokoRole = Role::findByName('Manajer Toko');
        $manajerTokoRole->givePermissionTo(['create-product', 'read-product', 'update-product', 'delete-product', 'create-pegawai', 'read-pegawai', 'update-pegawai', 'delete-pegawai']);

        $gudangRole = Role::findByName('Gudang');
        $gudangRole->givePermissionTo(['read-stok', 'update-stok']);  

    }
}

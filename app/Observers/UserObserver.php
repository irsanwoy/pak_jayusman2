<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user)
    {
        // Tambahkan data ke table employees
        Employee::create([
            'name' => $user->name,               // Mengambil nama dari table users
            'position' => 'Cashier',               // Default position (bisa disesuaikan)
            'branch_id' => 1,                    // Default branch_id (bisa disesuaikan)
            'created_at' => now(),               // Timestamp untuk created_at
            'updated_at' => now(),               // Timestamp untuk updated_at
        ]);
    }


    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user)
    {
        // Perbarui data di table employees jika diperlukan
        $employee = Employee::where('name', $user->name)->first();
        if ($employee) {
            $employee->update([
                'name' => $user->name,
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user)
    {
        // Hapus data dari table employees jika user dihapus
        Employee::where('name', $user->name)->delete();
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

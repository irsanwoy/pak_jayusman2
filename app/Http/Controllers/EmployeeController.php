<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    // public function index()
    // {
    //     $employees = Employee::with(['branch', 'user.roles'])->get(); // Mengambil relasi branch dan roles
    //     $roles = Role::all();
    //     return view('employees.index', compact('employees', 'roles'));
    // }

    // public function store(Request $request)
    // {
    //     // Validasi data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'position' => 'required|string|max:255',
    //         'branch_id' => 'required|integer',
    //         'role' => 'required|string', // Role harus dipilih
    //     ]);
    
    //     // Membuat pegawai baru
    //     $employee = Employee::create([
    //         'name' => $validated['name'],
    //         'position' => $validated['position'],
    //         'branch_id' => $validated['branch_id'],
    //     ]);
    
    //     // Membuat user untuk pegawai ini
    //     $user = User::create([
    //         'name' => $validated['name'],
    //         'email' => strtolower(str_replace(' ', '.', $validated['name'])) . '@domain.com',
    //         'password' => bcrypt('password123'),  // Ganti dengan password default
    //     ]);
    
    //     // Menambahkan relasi user ke pegawai
    //     $employee->user()->associate($user);
    //     $employee->save();  // Simpan employee
    
    //     // Memberikan role ke user
    //     $user->assignRole($validated['role']);
    
    //     return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan');
    // }
    

    // public function create()
    // {
    //     $roles = Role::all(); // Mendapatkan semua role
    //     $branches = Branch::all(); // Mendapatkan semua cabang
    //     return view('employees.create', compact('roles', 'branches'));
    // }
    
    // public function edit($id)
    // {
    //     $employee = Employee::with('user.roles')->findOrFail($id);
    //     $roles = Role::all(); // Ambil semua roles
    //     $branches = Branch::all(); // Ambil semua cabang
    //     return view('employees.edit', compact('employee', 'roles', 'branches'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validasi data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'position' => 'required|string|max:255',
    //         'branch_id' => 'required|integer',
    //         'role' => 'required|string', // Role harus dipilih
    //     ]);
    
    //     // Temukan employee berdasarkan id
    //     $employee = Employee::findOrFail($id);
    //     $employee->update([
    //         'name' => $validated['name'],
    //         'position' => $validated['position'],
    //         'branch_id' => $validated['branch_id'],
    //     ]);
    
    //     // Dapatkan user terkait pegawai ini
    //     $user = $employee->user;  // Asumsi sudah ada relasi user ke employee
    //     $user->syncRoles($validated['role']);  // Mengubah role pegawai sesuai pilihan baru
    
    //     return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diperbarui');
    // }


    // public function destroy(Employee $employee)
    // {
    //     $employee->delete();
    //     return redirect()->route('employee.index');
    // }
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('employees.create', compact('branches'));
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employee.index');
    }

    public function edit(Employee $employee)
    {
        $branches = Branch::all();
        return view('employees.edit', compact('employee', 'branches'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|in:Store Manager,Supervisor,Cashier,Waiter,Cleaner',
        'branch_id' => 'required|exists:branches,id',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update([
        'name' => $request->name,
        'position' => $request->position,
        'branch_id' => $request->branch_id,
    ]);

    return redirect()->route('employee.index')->with('success', 'Employee updated successfully!');
}


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}

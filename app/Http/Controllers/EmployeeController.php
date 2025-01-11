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
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('position', 'like', '%' . $search . '%')
                  ->orWhereHas('branch', function ($q) use ($search) {
                      $q->where('branch_name', 'like', '%' . $search . '%');
                  });
        }

        if ($request->has('branch_id') && $request->branch_id != '') {
            $query->where('branch_id', $request->branch_id);
        }

 
        $employees = $query->paginate(5);
        $branches = Branch::all();  

        return view('employees.index', compact('employees', 'branches'));
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

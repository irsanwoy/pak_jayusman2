<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('employee.create', compact('branches'));
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employee.index');
    }

    public function edit(Employee $employee)
    {
        $branches = Branch::all();
        return view('employee.edit', compact('employee', 'branches'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}

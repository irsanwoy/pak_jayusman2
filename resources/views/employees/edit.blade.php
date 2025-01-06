@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <h1>Edit Employee</h1>

    <!-- Menampilkan pesan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Employee -->
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Employee Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select id="position" name="position" class="form-select" required>
                <option value="">Select Position</option>
                <option value="Store Manager" {{ old('position', $employee->position) == 'Store Manager' ? 'selected' : '' }}>Store Manager</option>
                <option value="Supervisor" {{ old('position', $employee->position) == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Cashier" {{ old('position', $employee->position) == 'Cashier' ? 'selected' : '' }}>Cashier</option>
                <option value="Waiter" {{ old('position', $employee->position) == 'Waiter' ? 'selected' : '' }}>Waiter</option>
                <option value="Cleaner" {{ old('position', $employee->position) == 'Cleaner' ? 'selected' : '' }}>Cleaner</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="branch_id" class="form-label">Branch</label>
            <select id="branch_id" name="branch_id" class="form-select" required>
                <option value="">Select Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ old('branch_id', $employee->branch_id) == $branch->id ? 'selected' : '' }}>
                        {{ $branch->branch_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Employee</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection

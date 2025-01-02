@extends('layouts.app')

@section('title', 'Employees')

@section('content')
    <h1>Employees</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/employee/create') }}" class="text-white text-decoration-none">Add New Employee</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Name', 'Position', 'Branch', 'Actions']])
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->branch->branch_name }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/employee/{$employee->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent

                    <!-- Form Delete -->
                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection

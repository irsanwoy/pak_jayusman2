@extends('layouts.app')

@section('title', 'Employees')

@section('content')
    <h1>Employees</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/employees/create') }}" class="text-white text-decoration-none">Add New Employee</a>
    @endcomponent
    @component('components.table', ['headers' => ['ID', 'Name', 'Position', 'Branch']])
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->branch->branch_name }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/employees/{$employee->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent
                    @component('components.button', ['class' => 'btn-danger', 'onclick' => "deleteBranch({{ $employee->id }})"])
                        Delete
                    @endcomponent
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection

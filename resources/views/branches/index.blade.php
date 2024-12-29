@extends('layouts.app')

@section('title', 'Branches')

@section('content')
    <h1>Branches</h1>
    @component('components.button', ['class' => 'btn-success', 'type' => 'button'])
        <a href="{{ url('/branch/create') }}" class="text-white text-decoration-none">Add New Branch</a>
    @endcomponent
    <hr>
    @component('components.table', ['headers' => ['ID', 'Branch Name', 'Address', 'City', 'Actions']])
        @foreach ($branches as $branch)
            <tr>
                <td>{{ $branch->id }}</td>
                <td>{{ $branch->branch_name }}</td>
                <td>{{ $branch->address }}</td>
                <td>{{ $branch->city }}</td>
                <td>
                    @component('components.button', ['class' => 'btn-warning'])
                        <a href="{{ url("/branch/{$branch->id}/edit") }}" class="text-white text-decoration-none">Edit</a>
                    @endcomponent
                    <form action="{{ url("/branch/{$branch->id}") }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection

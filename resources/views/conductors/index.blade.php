@extends('layouts.app')
@section('content')
<h2>Conductor List</h2>
<a href="{{ route('conductors.create') }}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Staff ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conductors as $conductor)
        <tr>
            <td>{{ $conductor->first_name }}</td>
            <td>{{ $conductor->middle_name }}</td>
            <td>{{ $conductor->last_name }}</td>
            <td>{{ $conductor->staff_id }}</td>
            <td>{{ $conductor->email }}</td>
            <td>{{ $conductor->phone_number }}</td>
            <td>{{ $conductor->department_name }}</td>
            <td>
                <a href="{{ route('conductors.edit', $conductor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('conductors.destroy', $conductor->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

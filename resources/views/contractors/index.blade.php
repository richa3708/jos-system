@extends('layouts.app')
@section('content')
<h2>Contractor List</h2>
<a href="{{ route('contractors.create') }}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Balance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contractors as $contractor)
        <tr>
            <td>{{ $contractor->name }}</td>
            <td>{{ $contractor->code }}</td>
            <td>{{ $contractor->email }}</td>
            <td>{{ $contractor->phone_number }}</td>
            <td>{{ $contractor->company_name }}</td>
            <td>{{ $contractor->balance }}</td>
            <td>
                <a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
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

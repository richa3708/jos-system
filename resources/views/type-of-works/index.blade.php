@extends('layouts.app')
@section('content')
<h2>Type of Work List</h2>
<a href="{{ route('type-of-works.create') }}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Rate</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($typeOfWorks as $work)
        <tr>
            <td>{{ $work->name }}</td>
            <td>{{ $work->rate }}</td>
            <td>
                <a href="{{ route('type-of-works.edit', $work->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('type-of-works.destroy', $work->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
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

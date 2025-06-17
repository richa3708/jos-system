@extends('layouts.app')
@section('content')
<h2>Job Order List</h2>
<a href="{{ route('job-orders.create') }}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>JOS Date</th>
            <th>Type of Work</th>
            <th>Contractor</th>
            <th>Conductor</th>
            <th>Work Completed</th>
            <th>Reference</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobOrders as $jobOrder)
        <tr>
            <td>{{ $jobOrder->name }}</td>
            <td>{{ $jobOrder->date }}</td>
            <td>{{ $jobOrder->jos_date }}</td>
            <td>{{ $jobOrder->typeOfWork->name }}</td>
            <td>{{ $jobOrder->contractor->name }}</td>
            <td>{{ $jobOrder->conductor->first_name }} {{ $jobOrder->conductor->last_name }}</td>
            <td>{{ $jobOrder->actual_work_completed }}</td>
            <td>{{ $jobOrder->reference_number }}</td>
            <td>
                <a href="{{ route('job-orders.edit', $jobOrder->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('job-orders.destroy', $jobOrder->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
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

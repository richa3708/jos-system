@extends('layouts.app')
@section('content')
<h2>Add Job Order</h2>
<form action="{{ route('job-orders.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>JOS Date</label>
        <input type="date" name="jos_date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Type of Work</label>
        <select name="type_of_work_id" class="form-control" required>
            @foreach($typeOfWorks as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Contractor</label>
        <select name="contractor_id" class="form-control" required>
            @foreach($contractors as $contractor)
                <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Conductor</label>
        <select name="conductor_id" class="form-control" required>
            @foreach($conductors as $conductor)
                <option value="{{ $conductor->id }}">{{ $conductor->first_name }} {{ $conductor->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Actual Work Completed</label>
        <input type="number" step="0.01" name="actual_work_completed" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Remarks</label>
        <textarea name="remarks" class="form-control" required></textarea>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection

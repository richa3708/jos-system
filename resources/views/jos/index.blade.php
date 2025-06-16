@extends('layouts.app')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h2>Job Order Statements (JOS)</h2>

<form method="GET" class="mb-3">
    <label for="month">Filter by Month:</label>
    <input type="month" name="month" value="{{ $month }}">
    <button class="btn btn-sm btn-primary">Filter</button>
</form>

@foreach ($jobOrders as $groupKey => $group)
    @php
        $contractor = $group->first()->contractor;
        $conductor = $group->first()->conductor;
        $totalAmount = $group->sum(fn($jo) => $jo->actual_work_completed * $jo->typeOfWork->rate);
    @endphp

    <div class="card mb-3 p-3">
        <h5>Contractor: {{ $contractor->name }} | Conductor: {{ $conductor->first_name }} {{ $conductor->last_name }}</h5>
        <p>Total Job Orders: {{ $group->count() }} | Total Amount: ₹{{ number_format($totalAmount, 2) }}</p>

        <form method="POST" action="{{ route('jos.store') }}">
            @csrf
            <input type="hidden" name="contractor_id" value="{{ $contractor->id }}">
            <input type="hidden" name="conductor_id" value="{{ $conductor->id }}">
            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="job_order_ids[]" value="{{ implode(',', $group->pluck('id')->toArray()) }}">

            <div class="mb-2">
                <label>Paid Amount:</label>
                <input type="number" step="0.01" name="paid_amount" required>
            </div>

            <div class="mb-2">
                <label>Remarks:</label>
                <textarea name="remarks" class="form-control" rows="2" placeholder="Optional remarks..."></textarea>
            </div>

            <button class="btn btn-success">Create JOS</button>
        </form>
    </div>
@endforeach

@if ($existingJOSs->count())
    <h4 class="mt-4">Existing JOSs for {{ \Carbon\Carbon::parse($month)->format('F Y') }}</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Total Job Orders</th>
                <th>Total Amount</th>
                <th>Paid</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($existingJOSs as $jos)
                <tr>
                    <td>{{ $jos->reference_number }}</td>
                    <td>{{ $jos->total_job_orders }}</td>
                    <td>₹{{ number_format($jos->total_amount, 2) }}</td>
                    <td>₹{{ number_format($jos->paid_amount, 2) }}</td>
                    <td>₹{{ number_format($jos->balance_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('jos.show', $jos->id) }}" class="btn btn-sm btn-outline-info">
                            View Details
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection

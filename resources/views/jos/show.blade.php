@extends('layouts.app')
@section('content')
<h2>JOS Details - {{ $jos->reference_number }}</h2>

<table class="table table-bordered">
    <tr><th>Total Job Orders</th><td>{{ $jos->total_job_orders }}</td></tr>
    <tr><th>Total Amount</th><td>₹{{ number_format($jos->total_amount, 2) }}</td></tr>
    <tr><th>Paid Amount</th><td>₹{{ number_format($jos->paid_amount, 2) }}</td></tr>
    <tr><th>Balance Amount</th><td>₹{{ number_format($jos->balance_amount, 2) }}</td></tr>
    <tr><th>Remarks</th><td>{{ $jos->remarks }}</td></tr>
</table>

<h4>Linked Job Orders</h4>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Reference</th>
            <th>Date</th>
            <th>Type of Work</th>
            <th>Contractor</th>
            <th>Conductor</th>
            <th>Actual Work</th>
            <th>Rate</th>
            <th>Amount</th>
            <th>Download PDF</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jos->jobOrders as $jo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jo->reference_number }}</td>
                <td>{{ $jo->date }}</td>
                <td>{{ $jo->typeOfWork->name }}</td>
                <td>{{ $jo->contractor->name }}</td>
                <td>{{ $jo->conductor->first_name }} {{ $jo->conductor->last_name }}</td>
                <td>{{ $jo->actual_work_completed }}</td>
                <td>{{ $jo->typeOfWork->rate }}</td>
                <td>{{ $jo->actual_work_completed * $jo->typeOfWork->rate }}</td>
                <td>
                    <a href="{{ route('jos.pdf', $jos->id) }}" class="btn btn-outline-danger mb-3" target="_blank">
                        Download PDF
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

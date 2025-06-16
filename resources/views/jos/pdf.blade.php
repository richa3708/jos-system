<!DOCTYPE html>
<html>
<head>
    <title>{{ $jos->reference_number }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #444; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Job Order Statement</h2>
    <p><strong>Reference:</strong> {{ $jos->reference_number }}</p>
    <p><strong>Total Orders:</strong> {{ $jos->total_job_orders }}</p>
    <p><strong>Total Amount:</strong> Rs.{{ number_format($jos->total_amount, 2) }}</p>
    <p><strong>Paid:</strong> Rs.{{ number_format($jos->paid_amount, 2) }}</p>
    <p><strong>Balance:</strong> Rs.{{ number_format($jos->balance_amount, 2) }}</p>
    <p><strong>Remarks:</strong> {{ $jos->remarks }}</p>

    <h4>Linked Job Orders</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Reference</th>
                <th>Date</th>
                <th>Type</th>
                <th>Work Done</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jos->jobOrders as $jo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jo->reference_number }}</td>
                    <td>{{ $jo->date }}</td>
                    <td>{{ $jo->typeOfWork->name }}</td>
                    <td>{{ $jo->actual_work_completed }}</td>
                    <td>{{ $jo->typeOfWork->rate }}</td>
                    <td>{{ $jo->actual_work_completed * $jo->typeOfWork->rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

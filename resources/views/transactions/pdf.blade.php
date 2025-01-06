<!DOCTYPE html>
<html>
<head>
    <title>Transaction Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Transaction Report</h1>
    <p><strong>ID:</strong> {{ $transaction->id }}</p>
    <p><strong>Date:</strong> {{ $transaction->date }}</p>
    <p><strong>Branch:</strong> {{ $transaction->branch->branch_name }}</p>
    <p><strong>Employee:</strong> {{ $transaction->employee->name }}</p>
    <h2>Details</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction->transactionDetails as $detail)
                <tr>
                    <td>{{ $detail->product->product_name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->quantity * $detail->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total Amount:</strong> {{ $transaction->total }}</p>
</body>
</html>

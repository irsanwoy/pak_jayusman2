<!DOCTYPE html>
<html>
<head>
    <title>All Transaction Details Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>All Transaction Details Report</h1>
    <table>
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionDetails as $detail)
                <tr>
                    <td>{{ $detail->transaction->id ?? 'N/A' }}</td>
                    <td>{{ $detail->product->product_name ?? 'N/A' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price, 0, ',', '.') }}</td>
                    <td>{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

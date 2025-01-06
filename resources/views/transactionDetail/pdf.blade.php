<!DOCTYPE html>
<html>
<head>
    <title>Transaction Detail Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Transaction Detail Report</h1>
    <p><strong>ID:</strong> {{ $transactionDetail->id }}</p>
    <p><strong>Transaction ID:</strong> {{ $transactionDetail->transaction->id }}</p>
    <p><strong>Product:</strong> {{ $transactionDetail->product->product_name }}</p>
    <p><strong>Quantity:</strong> {{ $transactionDetail->quantity }}</p>
    <p><strong>Price:</strong> {{ $transactionDetail->price }}</p>
    <p><strong>Total:</strong> {{ $transactionDetail->quantity * $transactionDetail->price }}</p>
</body>
</html>

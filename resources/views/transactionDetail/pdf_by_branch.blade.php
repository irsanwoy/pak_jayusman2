<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Transaksi Cabang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi Cabang</h1>
    <p>Cabang: {{ $transactionDetails->first()->branch->branch_name }}</p>
    <table>
        <thead>
            <tr>
                                <th class="border px-4 py-2 dark:border-gray-600">Transaction ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Transaction Date</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Branch</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Employee</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Product</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Quantity</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionDetails as $detail)
            <tr>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->transaction_id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->date }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->branch->branch_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->employee->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->product->product_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $detail->quantity }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ number_format($detail->price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

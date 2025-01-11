<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Cabang</title>
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
    <p>Cabang: {{ $transactions->first()->branch->branch_name }}</p>
    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Karyawan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->employee->name }}</td>
                <td>{{ $transaction->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

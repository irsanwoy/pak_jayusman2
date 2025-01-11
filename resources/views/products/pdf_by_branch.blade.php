<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Transaksi Product</title>
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
    <h1>Laporan Transaksi Produk</h1>
    <p>Cabang: {{ $products->first()->branch->branch_name }}</p>
    <table>
        <thead>
            <tr>
                                <th class="border px-4 py-2 dark:border-gray-600">ID</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Date</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Branch</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Employee</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Product Name</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Price</th>
                                <th class="border px-4 py-2 dark:border-gray-600">Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
            <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->id }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->date }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->branch->branch_name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->employee->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->product_name }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->price }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-600">{{ $product->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

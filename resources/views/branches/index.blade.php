<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
</head>
<body>
    <h1>List of Branches</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Branch Name</th>
                <th>Address</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @forelse($branches as $branch)
                <tr>
                    <td>{{ $branch->id }}</td>
                    <td>{{ $branch->branch_name }}</td>
                    <td>{{ $branch->address }}</td>
                    <td>{{ $branch->city }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No branches found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

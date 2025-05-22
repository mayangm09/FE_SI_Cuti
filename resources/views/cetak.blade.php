<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f3f4f6;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>👤 Data User</h2>
    <table>
        <thead>
            <tr>
                <th>id_user</th>
                <th>Password</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $usr)
            <tr>
                <td>{{ $usr['id_user'] }}</td>
                <td>{{ $usr['password'] }}</td>
                <td>{{ $usr['username'] }}</td>
                <td>{{ $usr['level'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
  <title>Users List</title>
  <style>
    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 12px 15px;
      text-align: left;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    h2 {
      text-align: center;
      font-family: Arial, sans-serif;
    }
  </style>
</head>

<body>


  <h2>Registered Users</h2>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registered At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($userData as $user)
      <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name ?? 'N/A' }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->format('d-M-Y H:i') }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

</body>

</html>
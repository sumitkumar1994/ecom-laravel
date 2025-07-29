@extends('layouts.masterLayout')


@section('content')
  <div class="container mt-5">
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
  </div>
@endsection
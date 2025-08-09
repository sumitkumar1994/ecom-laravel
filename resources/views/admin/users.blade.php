@extends('layouts.adminLayout')
@section('title')
  Users
@endsection
@section('users')
  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0">Manage Users</h6>
      <a href="{{ route('admin.users.add') }}" class="btn-primary text-white p-2">Add Users</a>
    </div>
    <div class="table-responsive">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
      <thead>
        <tr class="text-dark">
        <th scope="col">CheckBox</th>

        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Registered At</th>
        <th scope="col">UpdateUsers</th>
        <th scope="col">RemoveUsers</th>

        </tr>
      </thead>
      <tbody>

        @foreach($userData as $user)
      <tr>
      <td><input class="form-check-input" type="checkbox"></td>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name ?? 'N/A' }}</td>
      <td>{{ $user->email }}</td>
      <td> {{ config('roles.' . $user->role) ?? 'Unknown' }}</td>

      <td>{{ $user->created_at->format('d-M-Y H:i') }}</td>
      <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-lg btn-primary">Edit</a></td>
      <td>
        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
        onsubmit="return confirm('Are you sure to delete this user?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-lg">Delete</button>

        </form>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    </div>
  </div>

@endsection
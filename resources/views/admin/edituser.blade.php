@extends('layouts.adminLayout')
@section('title')
  editUser
@endsection
@section('users')
  <div class="row mt-3">
    <div class="col-sm-12 col-xl-4"></div>
    <div class="col-sm-12 col-xl-4">
    <div class="bg-light rounded h-100 p-4">
      <h6 class="mb-4">Update Users</h6>
      <form method="post" action="{{ route('admin.users.update', $user->id) }}">
      @csrf

      <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">

      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    </div>
  </div>


@endsection
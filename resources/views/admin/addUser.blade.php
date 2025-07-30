@extends('layouts.adminLayout')
@section('users')
  <div class="row mt-3">
    <div class="col-sm-12 col-xl-4"></div>
    <div class="col-sm-12 col-xl-4">
    <div class="bg-light rounded h-100 p-4">
      <h6 class="mb-4">Add Users</h6>
      <form method="post" action="{{ route('users.add') }}">
      @csrf

      <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

      </div>


      <div class=" mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
    </div>
  </div>
@endsection
@section('title')
  adduser
@endsection
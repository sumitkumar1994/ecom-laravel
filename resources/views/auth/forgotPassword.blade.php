@extends('layouts.loginLayout')
@section('content')
<div class="login-box">
  <h2>Forgot Your Password?</h2>

  @if(session('status'))
    <div class="success">{{ session('status') }}</div>
  @endif
    {{-- Email ka error show --}}
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
    <button type="submit">Send Reset Link</button>
</form>
<div class="login-link"><a href="{{ route('login') }}">Back to Login</a></div>
</div>
@if(session('error'))
  <div class="error">{{ session('error') }}</div>
@endif
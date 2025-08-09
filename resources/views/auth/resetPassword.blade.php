@extends('layouts.loginLayout')

@section('content')
<div class="login-box ">
 <h2>  Reset Password</h2>
   @if($errors->any())
    <div class="error">{{ $errors->first() }}</div>
  @endif
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    
    {{-- Hidden Inputs --}}
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    {{-- Password Field --}}
    <div>
        <label for="password">New Password</label>
        <input id="password" type="password" name="password" placeholder="Enter new password" required>
    </div>

    {{-- Confirm Password Field --}}
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm new password" required>
    </div>

    {{-- Submit Button --}}
    <div>
        <button type="submit">Reset Password</button>
    </div>
</form>
<div class="login-link"><a href="{{ route('login') }}">Back to Login</a></div>
</div>


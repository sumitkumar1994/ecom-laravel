@extends('layouts.loginLayout')

@section('content')
  <div class="login-box">
    <h2>Welcome Back 👋</h2>

    @if($errors->any())
   <p style="color: red">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    </form>
    <div class="login-link">
    <a href="{{ route('password.request') }}">Forgot your password?</a>
    </div>
    <div class="login-link">
    Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
    </div>
    @if (session('success'))
    
       <p style="color: green">{{ session('success') }}</p>
    
    @endif

    @if(session('error'))
    <div class="error">{{ session('error') }}</div>
    @endif
  </div>
@endsection
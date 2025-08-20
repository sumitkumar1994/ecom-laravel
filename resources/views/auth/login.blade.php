@extends('layouts.loginLayout')

@section('content')
  <div class="login-box">
    <h2 id="welcome"></h2>

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
    Don't have an account? <a href="{{ route('register') }}"><span id="typing"></span> </a>
    </div>
    {{-- @if (session('success'))

    <p style="color: green">{{ session('success') }}</p>

    @endif --}}

    @if(session('error'))
    <div class="error">{{ session('error') }}</div>
    @endif

  </div>

  {{-- Typing Animation Script --}}
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    let text = "Sign up here";
    let text2 = "Welcome Back 👋";  // 👋 emoji
    let i = 0;

    // string ko array me convert kar dete hain (emoji bhi ek element banega)
    let arr1 = Array.from(text);
    let arr2 = Array.from(text2);

    function typingEffect() {
      if (i < arr1.length || i < arr2.length) {
      if (i < arr1.length) {
        document.getElementById("typing").innerHTML += arr1[i];
      }
      if (i < arr2.length) {
        document.getElementById("welcome").innerHTML += arr2[i];
      }
      i++;
      setTimeout(typingEffect, 300); // speed control
      }
    }

    typingEffect();
    });
  </script>

@endsection
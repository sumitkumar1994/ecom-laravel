<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <style>
    body {
      background: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .login-box {
      width: 360px;
      padding: 40px;
      margin: 100px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px #aaa;
    }

    .login-box h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background: #3498db;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .login-box button:hover {
      background: #2980b9;
    }

    .error {
      color: red;
      font-size: 0.9em;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <h2>Login</h2>
    @if($errors->any())
    <div class="error">{{ $errors->first() }}</div>
  @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>
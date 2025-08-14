<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .login-box {
      background: #fff;
      width: 100%;
      max-width: 400px;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: border-color 0.3s;
    }

    .login-box input:focus {
      border-color: #667eea;
      outline: none;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background: #667eea;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-box button:hover {
      background: #5a67d8;
    }

    .error {
      background-color: #ffdddd;
      color: #d8000c;
      padding: 10px 15px;
      margin-bottom: 15px;
      border: 1px solid #d8000c;
      border-radius: 6px;
      font-size: 0.9em;
    }

    .login-box .login-link {
      margin-top: 15px;
      text-align: center;
      font-size: 0.9em;
    }

    @media (max-width: 500px) {
      .login-box {
        margin: 20px;
        padding: 30px 20px;
      }
    }
  </style>
</head>

<body>
  <div class="login-box">
    <h2>Admin Login 👋</h2>

    @if($errors->any())
    <div class="error">{{ $errors->first() }}</div>
  @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <input type="email" name="email" placeholder="Email"  value="{{ old('email') }}">
      <input type="password" name="password" placeholder="Password" >
      <button type="submit">Login</button>
    </form>
    <div class="login-link">
      Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
    </div>

    @if(session('error'))
    <div class="error">{{ session('error') }}</div>
  @endif
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .signup-box {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 420px;
    }

    .signup-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .signup-box input[type="text"],
    .signup-box input[type="email"],
    .signup-box input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: 0.3s border;
    }

    .signup-box input:focus {
      border-color: #667eea;
      outline: none;
    }

    .signup-box button {
      width: 100%;
      padding: 12px;
      background: #667eea;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .signup-box button:hover {
      background: #5a67d8;
    }

    .signup-box .login-link {
      margin-top: 15px;
      text-align: center;
      font-size: 0.9em;
    }

    .signup-box .login-link a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
    }

    .error {
      color: red;
      background: #ffe5e5;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      font-size: 0.9em;
    }
  </style>
</head>

<body>
  <div class="signup-box">
    <h2>Create an Account</h2>

    @if($errors->any())
    <div class="error">{{ $errors->first() }}</div>
  @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
      <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
      <button type="submit">Sign Up</button>
    </form>

    <div class="login-link">
      Already have an account? <a href="{{ route('login') }}">Login here</a>
    </div>
  </div>
</body>

</html>
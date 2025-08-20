<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- toastr CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
      background: rgba(255, 255, 255, 0.7);
      /* 0.6 = 60% opacity */
      width: 100%;
      max-width: 400px;
      padding: 40px;
      border-radius: 15px;
      border: 4px solid #0ff;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
      animation: neonBorder 5s infinite alternate;


    }

    @keyframes neonBorder {
      0% {
        border-color: #0ff;
        /* Cyan */
        box-shadow: 0 0 10px #0ff, 0 0 20px #0ff, 0 0 40px #0ff;
      }

      25% {
        border-color: #ff00ff;
        /* Pink */
        box-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff, 0 0 40px #ff00ff;
      }

      50% {
        border-color: #00ff00;
        /* Green */
        box-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00, 0 0 40px #00ff00;
      }

      75% {
        border-color: #ffff00;
        /* Yellow */
        box-shadow: 0 0 10px #ffff00, 0 0 20px #ffff00, 0 0 40px #ffff00;
      }

      100% {
        border-color: #ff0000;
        /* Red */
        box-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000, 0 0 40px #ff0000;
      }
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

  @yield('content')




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    $(document).ready(function () {
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "4000"
      };

      @if(session('success'))
      toastr.success("{{ session('success') }}");
    @endif

      @if(session('error'))
      toastr.error("{{ session('error') }}");
    @endif

      @if(session('info'))
      toastr.info("{{ session('info') }}");
    @endif

      @if(session('warning'))
      toastr.warning("{{ session('warning') }}");
    @endif
    });
  </script>
</body>

</html>
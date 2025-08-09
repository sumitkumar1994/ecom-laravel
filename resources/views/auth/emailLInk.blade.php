<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body>
    <h2> Sub:-Password Reset Request</h2>

    <p>Dear,{{ $user->name }}</p>
    <p>We received a request to reset your password for your account.</p>
    <p>
        Click the button below to reset your password:
    </p>

    <p>
        <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" 
           style="background-color: #4CAF50; color: white; padding: 10px 20px; 
                  text-decoration: none; border-radius: 5px;">
           Reset Password
        </a>
    </p>

    <p>If you did not request a password reset, you can ignore this email.</p>
    <p>Thanks,<br>The Ecom Team</p>
</body>
</html>

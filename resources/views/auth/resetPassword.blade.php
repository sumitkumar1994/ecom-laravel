@extends('layouts.loginLayout')

@section('content')
<div class="login-box">
    <h2>Reset Password</h2>
    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    {{-- Show Timer --}}
    @if(isset($expires_at))
        <div id="timer" style="margin-bottom: 15px; font-weight: bold; color: red;"></div>
        <script>
            let expiryTime = new Date("{{ \Carbon\Carbon::parse($expires_at)->format('Y-m-d H:i:s') }}").getTime();
            let timerInterval = setInterval(function() {
                let now = new Date().getTime();
                let distance = expiryTime - now;

                if (distance < 0) {
                    clearInterval(timerInterval);
                    document.getElementById("timer").innerHTML = "Token expired!";
                    document.querySelector("form").style.display = "none";
                    return;
                }

                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("timer").innerHTML =
                    "Time remaining: " + minutes + "m " + seconds + "s";
            }, 1000);
        </script>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div>
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" placeholder="Enter new password" >
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm new password" >
        </div>

        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>

    <div class="login-link"><a href="{{ route('login') }}">Back to Login</a></div>
</div>
@endsection

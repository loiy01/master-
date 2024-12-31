<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/login.css">

    <title>الاختراق الفني</title>
    
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset('assets/images/tools-table.jpg') }}') no-repeat center center fixed; /* Replace with your AI image */
            background-size: cover; /* Ensure the image covers the whole page */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        /* Login Box Styles */

    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">
            <img class="dash_img" src="{{ asset('assets') }}/images/logo1.png" alt="Logo">
        </div>
        <h2>تسجيل الدخول</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Input Email -->
            <input type="email" name="email" placeholder="البريد الإلكتروني" required value="{{ old('email') }}">
            @error('email')
                <div class="error" style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ $message }}
                </div>
            @enderror

            <!-- Input Password -->
            <input type="password" name="password" placeholder="الرقم السري" required>
            @error('password')
                <div class="error" style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ $message }}
                </div>
            @enderror

            <!-- Display error for login attempt -->
            @if(session('error'))
                <div class="error" style="color: red; font-size: 12px; margin-top: 5px;">
                    {{ session('error') }}
                </div>
            @endif

            <button type="submit">التسجيل</button>
        </form>

        <div class="register-link">
            <a href="{{ route('register') }}" class="register-btn">مستخدم جديد؟</a>
        </div>
    </div>
</body>
</html>

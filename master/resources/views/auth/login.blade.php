<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    
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
        .login-box {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            padding: 40px;
            width: 350px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .login-box:hover {
            transform: scale(1.05); /* Slight scale effect on hover */
        }

        .login-box h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Logo Styles */
        .login-box .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box .logo img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .login-box input {
            width: 100%;
            padding: 14px 20px;
            margin: 10px 0;
            display: inline-block;
            border: 2px solid #ddd;
            border-radius: 25px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f1f1f1;
            transition: border-color 0.3s ease;
        }

        .login-box input:focus {
            border-color: #2575fc; /* Blue border on focus */
            outline: none;
        }

        /* Button Styles */
        .login-box button {
            background-color: #2575fc;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-box button:hover {
            background-color: #6a11cb; /* Purple on hover */
        }
        .register-link {
    text-align: center;
    margin-top: 10px;
}

.register-btn {
    font-size: 16px;
    color: #007bff;
    text-decoration: none;
    border: 1px solid #007bff;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.register-btn:hover {
    background-color: #007bff;
    color: white;
}


        /* Optional: add responsiveness for smaller devices */
        @media (max-width: 600px) {
            .login-box {
                width: 90%;
                padding: 30px;
            }
        }
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

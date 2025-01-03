<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <title>تسجيل حساب جديد</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset('assets/images/tools-table.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
            overflow: hidden; /* Prevents scroll on the body */
        }

        /* Error Message Styles */
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <div class="logo">
            <img class="dash_img" src="{{ asset('assets') }}/images/logo1.png" alt="Logo">
        </div>
        <h2>تسجيل حساب جديد</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="الاسم" style="direction: rtl; text-align: right;" required autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Email -->
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني" style="direction: rtl; text-align: right;" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Phone -->
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="رقم الهاتف" style="direction: rtl; text-align: right;" required>
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Address -->
            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="العنوان" style="direction: rtl; text-align: right;">
            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <input type="password" id="password" name="password" placeholder="كلمة المرور" style="direction: rtl; text-align: right;" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Confirm Password -->
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور" style="direction: rtl; text-align: right;" required>

            <!-- Register Button -->
            <button type="submit">تسجيل</button>
        </form>
    </div>
</body>
</html>

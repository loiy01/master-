<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>User Registration</title>
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

        /* Registration Box Styles */

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
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="الاسم" required autofocus>

            <!-- Email -->
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني" required>

            <!-- Phone -->
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="رقم الهاتف" required>

            <!-- Address -->
            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="العنوان" required>

            <!-- Password -->
            <input type="password" id="password" name="password" placeholder="كلمة المرور" required>

            <!-- Confirm Password -->
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>

            <!-- Register Button -->
            <button type="submit">تسجيل</button>
        </form>
    </div>
</body>
</html>

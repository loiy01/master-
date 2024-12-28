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
        .register-box {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            padding: 30px 20px; /* Adjusted padding for a smaller box */
            width: 350px;
            text-align: center;
            height: auto; /* Auto-adjusts the height to fit content */
            box-sizing: border-box;
        }

        .register-box h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .register-box .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .register-box .logo img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .register-box input {
            width: 100%;
            padding: 12px 18px;
            margin: 10px 0;
            display: inline-block;
            border: 2px solid #ddd;
            border-radius: 25px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f1f1f1;
            transition: border-color 0.3s ease;
        }

        .register-box input:focus {
            border-color: #2575fc;
            outline: none;
        }

        /* Button Styles */
        .register-box button {
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

        .register-box button:hover {
            background-color: #6a11cb;
        }

        /* Optional: add responsiveness for smaller devices */
        @media (max-width: 600px) {
            .register-box {
                width: 90%;
                padding: 20px;
            }
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

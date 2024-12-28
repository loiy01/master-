<style>
    
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap');
    
    body,
    html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: "Noto Sans Arabic", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:
            "wdth" 100;
    }

    .header_section {
        width: 100%;
        position: relative;
    }

    .navbar {
        margin-bottom: 0;
        position: absolute;
        top: 0;
        width: 90%;
        z-index: 2;
    }

    /* تنسيق جديد للـ Navbar */
    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 10px; /* المسافة بين العناصر */
    }

    .nav-item {
        margin: 0 5px; /* هوامش جانبية أصغر */
    }

    .nav-link {
        padding: 8px 12px !important; /* تقليل الـ padding */
        white-space: nowrap; /* منع انتقال النص إلى سطر جديد */
        font-size: 14px; /* حجم خط أصغر */
    }

    /* تنسيق خاص لزر تسجيل الخروج */
    .logout-btn {
        background: none;
        border: none;
        color: white; /* تغيير لون النص إلى أبيض */
        padding: 8px 12px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none; /* إزالة التسطير */
    }

    .logo {
        margin-right: 20px;
    }

    .logo img {
        height: 70px;
        width: 70px;
        
    }

    .banner_section {
        position: relative;
        height: 100vh;
        background: url({{asset("assets/images/cover.webp")}}) no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding-top: 70px;
    }

    .banner_section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .banner_taital_main {
        position: relative;
        z-index: 1;
    }

    .banner_taital {
        font-size: 3rem;
        margin: 0;
    }

    .banner_text {
        font-size: 1.5rem;
        margin: 10px 0 20px;
    }

    .btn_main {
        margin-top: 20px;
    }

    .started_text a {
        color: white;
        background-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    .started_text a:hover {
        background-color: #0056b3;
    }
    .nav-item img {
    height: 24px; /* تصغير الارتفاع */
    width: 24px;  /* تصغير العرض */
}
@media (max-width: 991.98px) {
    .navbar-collapse {
        background-color: rgb(49, 62, 66); /* اللون المخصص للخلفية */
        padding: 10px; /* إضافة padding لتحسين المظهر */
    }}
</style>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo1.png') }}" alt="Logo"></a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">الرئيسية</a>
    </li>
    <li class="nav-item {{ Route::is('ap') ? 'active' : '' }}">
        <a href="{{ route('ap') }}" class="nav-link">الكور و القص</a>
    </li>
    <li class="nav-item {{ Route::is('prod') ? 'active' : '' }}">
        <a href="{{ route('prod') }}" class="nav-link">المتجر</a>
    </li>
    <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}">
        <a href="{{ route('contact') }}" class="nav-link">التواصل</a>
    </li>
    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
        <a href="/about.html" class="nav-link">من نحن</a>
    </li>
</ul>


            <!-- العناصر التي تظهر على الجهة اليسرى -->
            @if (Route::has('login'))
                @auth
                    <ul class="navbar-nav mr-auto"> <!-- `mr-auto` لجعل هذه العناصر على الجهة اليسرى -->
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <img src="{{ asset('assets/images/icons8-administrator-male-32.png') }}" alt="Admin">
                            </a>
                        </li>
                        <li class="nav-item ">
                    <a href={{route("cart.index")}} class="nav-link">
                        <img src="{{ asset('assets/images/icons8-buy-32.png') }}" alt="Cart">
                    </a>
                </li>
                        <li class="nav-item logout-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-btn">تسجيل الخروج</button>
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mr-auto"> <!-- `mr-auto` لجعل هذه العناصر على الجهة اليسرى -->
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">انشاء حساب</a></li>
                        @endif
                    </ul>
                @endauth
            @endif
        </div>
    </nav>
</div>


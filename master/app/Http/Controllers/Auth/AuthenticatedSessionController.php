<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
// LoginController.php
public function store(Request $request)
{
    // التحقق من المدخلات
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // التحقق من وجود الايميل أولاً
    $user = \App\Models\User::where('email', $request->email)->first();
    
    if (!$user) {
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'البريد الإلكتروني غير مسجل في النظام'
            ]);
    }

    // محاولة تسجيل الدخول
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // تسجيل الدخول ناجح
        return redirect()->intended('/');
    }

    // إذا وصلنا هنا، فهذا يعني أن كلمة المرور خاطئة
    return back()
        ->withInput()
        ->withErrors([
            'password' => 'كلمة المرور غير صحيحة'
        ]);
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

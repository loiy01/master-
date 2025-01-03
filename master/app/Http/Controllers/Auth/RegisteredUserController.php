<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed', // تأكيد كلمة المرور
                'phone' => [
                    'required',
                    'numeric',
                    'digits:10',
                    'regex:/^(079|078|077)[0-9]{7}$/', // التحقق من البداية برقم صحيح
                ],
                'address' => 'string|max:255',
            ],
            [
                'password.min' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل.',
                'password.required' => 'كلمة المرور مطلوبة.',
                'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
                'email.required' => 'البريد الإلكتروني مطلوب.',
                'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
                'email.unique' => 'البريد الإلكتروني مسجل بالفعل.',
                'phone.required' => 'رقم الهاتف مطلوب.',
                'phone.numeric' => 'يجب أن يكون رقم الهاتف أرقامًا فقط.',
                'phone.digits' => 'يجب أن يحتوي رقم الهاتف على 10 أرقام.',
                'phone.regex' => 'يجب أن يبدأ رقم الهاتف بـ 079 أو 078 أو 077.',
                'address.required' => 'العنوان مطلوب.',
                'address.max' => 'يجب ألا يزيد العنوان عن 255 حرفًا.',
            ]
        );
    
        // إنشاء المستخدم الجديد
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(RouteServiceProvider::HOME);
    }
    
    

}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        return view('auth.user.appointments');
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'service_type' => 'required|string|max:255',
            'time' => 'required|date|after_or_equal:today',
            'description' => 'nullable|string',
            'location' => 'required|string',
        ],
        [
            'time.after_or_equal' => 'لا يمكن الحجز في موعد سابق. يرجى اختيار تاريخ مناسب.', // رسالة خطأ مخصصة
            'time.required' => 'حقل التاريخ مطلوب.',
        ]);

        // التأكد من أن المستخدم قد قام بتسجيل الدخول
        if (Auth::check()) {
            // إنشاء الحجز
            Appointments::create([
                'user_id' => Auth::id(), // الحصول على ID المستخدم
                'service_type' => $validated['service_type'],
                'time' => $validated['time'],
                'description' => $validated['description'],
                'location' => $validated['location'],
                'show' => false,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->back()->with('success', 'تم إضافة الحجز بنجاح.');
        } else {
            // إعادة التوجيه مع رسالة خطأ
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول أولاً.');
        }
    }
    

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admins=Admin::all();
        return view("admin.admins.index" ,compact("admins"));
    }
    public function create(){
        return view("admin.admins.create");
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validata = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:admins,email',
            'password' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
            'is_super' => 'nullable|boolean',
        ]);
    
        // إضافة البيانات إلى الجدول
        Admin::create([
            'name' => $validata['name'],
            'email' => $validata['email'],
            'password' => bcrypt($validata['password']), // تشفير كلمة المرور
            'is_active' => $request->input('is_active', 1), // قيمة افتراضية 1 إذا لم تُمرر
            'is_super' => $request->input('is_super', 0),   // قيمة افتراضية 0 إذا لم تُمرر
        ]);
    
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.admin.index')->with('success', 'Admin added successfully!');
    }
    public function toggleStatus($id)
{
    // البحث عن الإداري بواسطة المعرف
    $admin = Admin::findOrFail($id);

    // تبديل حالة is_active
    $admin->is_active = !$admin->is_active;
    $admin->save();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('admin.admin.index')->with('success', 'Admin status updated successfully!');
}

    
    

}

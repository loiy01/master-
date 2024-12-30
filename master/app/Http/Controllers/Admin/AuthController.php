<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Message;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $categories = Category::all();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $credentials['email'])->first();

    if (!$admin || $admin->is_active == 0) {
        return back()->withErrors([
            'email' => 'Your account is inactive. Please contact support.',
        ]);
    }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard',compact('categories')));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('admin.login'));
    }

    public function dashboard()
    {
        $totalSales =Order::where('status', 'confirmed')->sum('total_order'); // إجمالي المبيعات
        $totalCustomers = User::count(); // عدد العملاء
        $totalMessages = Message::count(); // عدد الرسائل
        $recentOrders = Order::latest()->take(5)->get(); // آخر 5 طلبات
        // dd($totalSales);
        $orders = Order::where('status', 'pending')->paginate(10);
        
        return view('admin.dashboard', compact('totalSales', 'totalCustomers', 'totalMessages', 'recentOrders','orders'));
    
    }
    public function new(){
        return view("admin.dashboards");
       
    }
    

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Order;
use App\Models\Message;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $totalSales = Order::sum('order_total_amount_after'); // إجمالي المبيعات
        $totalCustomers = User::count(); // عدد العملاء
        $totalMessages = Message::count(); // عدد الرسائل
        $recentOrders = Order::latest()->take(5)->get(); // آخر 5 طلبات

        return view('admin.dashboard', compact('totalSales', 'totalUser', 'totalMessages', 'recentOrders'));
    }
}

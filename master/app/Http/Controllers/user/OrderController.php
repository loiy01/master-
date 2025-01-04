<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=auth()->user()->orders;
        return view('auth.user.order.index',compact('orders'));
    }
    public function show($id)
    {
        // جلب الطلب مع العناصر المرتبطة به
        $order = Order::with('order_products')->findOrFail($id);
        
        // عرض صفحة تفاصيل الطلب
        return view('auth.user.order.detal', compact('order'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        // الحصول على قيمة status من الـ request
        $status = $request->input('status');
    
        // إذا كانت قيمة status موجودة، قم بتصفية الطلبات بناءً عليها
        if ($status) {
            $orders = Order::where('status', $status)
                ->orderBy('created_at', 'desc')
                ->paginate(10); // عرض 10 طلبات في كل صفحة
        } else {
            // إذا لم تكن هناك فلترة، احصل على جميع الطلبات
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        }
    
        // إعادة عرض الصفحة مع البيانات المفلترة أو جميع الطلبات
        return view('admin.orders.index', compact('orders'));
    }
    public function detals(){
        $order = Order::all();
        return view("admin.orders.detail" ,compact("order"));

    }
    public function showOrderItems($id)
{
    $orderData = Order::with(['products', 'user'])->findOrFail($id);


        return view('admin.orders.detail', compact('orderData'));
    }
    public function updateOrderStatus(Request $request)
{
    // التحقق من وجود id و status في الـ request
    $orderId = $request->input('id');
    $status = $request->input('status');

    // العثور على الطلب بناءً على الـ id
    $order = Order::find($orderId);

    // إذا تم العثور على الطلب، قم بتحديث حالته
    if ($order) {
        $order->status = $status;
        $order->save(); // حفظ التغييرات في قاعدة البيانات

        // إعادة التوجيه إلى صفحة تفاصيل الطلب مع رسالة تأكيد
        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    // في حالة عدم العثور على الطلب، إعادة التوجيه مع رسالة خطأ
    return redirect()->back()->with('error', 'Order not found!');
}
}

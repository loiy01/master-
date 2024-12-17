<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view("admin.orders.index",compact("orders"));
    }
    public function detals(){
        $order = Order::all();
        return view("admin.orders.detail" ,compact("order"));

    }
    public function showOrderItems($id)
{
    $orderData = Order::with(['products', 'user'])->findOrFail($id);

//     $order = [
//         'order_id' => $order->id,
//         'user_name' => $order->user ? $order->user->name : 'Unknown',
//         'user_phone' => $order->user ? $order->user->phone : 'Unknown',
//         'user_address1' => $order->user ? $order->user->address1 : 'Unknown',
//         'order_total_amount' => $order->total_order,
//         'created_at' => $order->created_at,
//         'order_status' => $order->order_status,
//         'products' => $order->products->map(function ($product) {
//             return [
//                 'product_name' => $product->name,
//                 'product_price' => $product->price,
//                 'product_image' => $product->image,
//                 'quantity' => $product->pivot->quantity,
//             ];
//         }),
//     ];
// dd($order);

        return view('admin.orders.detail', compact('orderData'));
    }
}

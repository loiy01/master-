<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
            'user_id',
            'total_order',
            'status',
            'delivery_location',
            
        
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');

    }
    public function showOrderDetails($orderId)
    {
        // استرجاع البيانات من قاعدة البيانات
        $order = Order::with('orderItems')->findOrFail($orderId);

        // تمرير البيانات إلى الـ View
        return view('admin.order_details', compact('order'));
    }
 
}


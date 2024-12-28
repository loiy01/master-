<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\order_products;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('auth.user.cart.cart', compact('cart'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
    
        // تحقق من الكمية المتاحة
        if ($product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Quantity requested exceeds available stock.');
        }
    
        // استرجاع السلة من الجلسة أو إنشاء سلة جديدة
        $cart = session()->get('cart', []);
    
        // إضافة المنتج إلى السلة
        $cart[$request->product_id] = [
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'max_quantity' => $product->quantity,
            'image' => $product->image
        ];
    
        // تقليل الكمية من المنتج في قاعدة البيانات
        $product->save();
    
        // حفظ السلة في الجلسة
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index');
    }
    


    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function checkout()
    {
        // الحصول على السلة من الجلسة
        $cart = session()->get('cart', []);
    
        // التحقق إذا كانت السلة فارغة باستخدام empty()
        if (empty($cart)) {
            return redirect()->route('prod')->with('error', 'Your cart is empty. Please add products to your cart before checking out.');
        }
    
        // حساب المبلغ الإجمالي
        $total_order = array_reduce($cart, function ($total, $product) {
            return $total + ($product['quantity'] * $product['price']);
        }, 0);
    
        // إنشاء طلب جديد في قاعدة البيانات
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_order' => $total_order,
            'delivery_location' => request()->input('delivery_location'),
            'status' => 'pending',
        ]);
    
        // إضافة المنتجات إلى الجدول الوسيط (order_products)
        foreach ($cart as $productId => $details) {
            order_products::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
    
            // تقليل الكمية من المنتج في قاعدة البيانات
            $product = Product::find($productId);
            $product->quantity -= $details['quantity'];
            $product->save();
        }
    
        // مسح السلة بعد إتمام الطلب
        session()->forget('cart');
    
        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }
    

    
    
}

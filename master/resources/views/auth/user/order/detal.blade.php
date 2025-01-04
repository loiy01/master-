@extends('auth.user.master')

@section('content')
<style>
    .order-detail-container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 2rem;
        text-align: right;
    }

    .order-detail-container h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .order-detail-container p {
        font-size: 1.1rem;
        margin-bottom: 1rem;
        color: #6b7280;
    }

    .order-detail-container .order-items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2rem;
    }

    .order-detail-container .order-items-table th, .order-detail-container .order-items-table td {
        padding: 1rem;
        text-align: right;
        border: 1px solid #ddd;
    }

    .order-detail-container .order-items-table th {
        background-color: #f8f9fa;
    }

    .order-detail-container .order-items-table td {
        background-color: #f9fafb;
    }

    .back-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        margin-top: 1rem;
        background-color: #007bff;
        color: #fff;
        border-radius: 0.375rem;
        text-decoration: none;
        font-size: 1rem;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="order-detail-container">
    <h2>تفاصيل الطلب رقم: {{ $order->id }}</h2>
    
    <p>الحالة: {{ $order->status }}</p>
    <p>التاريخ: {{ $order->created_at->format('Y-m-d') }}</p>
    <p>إجمالي الطلب: {{ number_format($order->total_order, 2) }} دينار</p>

    <h3>تفاصيل العناصر:</h3>
    <table class="order-items-table">
        <thead>
            <tr>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_products as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }} دينار</td>
                <td>{{ number_format($item->quantity * $item->price, 2) }} دينار</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('ord') }}" class="back-btn">الرجوع إلى قائمة الطلبات</a>
</div>

@endsection

@extends('auth.user.master')

@section('content')
<style>
    .orders-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        padding: 1rem;
    }

    .order-card {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        transition: transform 0.2s, box-shadow 0.2s;
        text-align: right;
        position: relative;
        overflow: hidden;
    }

    .order-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }

    .order-card h3 {
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
        color: #212529;
    }

    .order-card p {
        font-size: 1rem;
        margin-bottom: 1rem;
        color: #495057;
    }

    .order-card .order-date {
        font-size: 0.875rem;
        color: #868e96;
        margin-bottom: 1rem;
    }

    .order-card .order-total {
        font-weight: bold;
        color: #007bff;
        margin-bottom: 1rem;
    }

    .order-card a {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        background-color: #fda417;
        color: #fff;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.2s;
    }

    .order-card a:hover {
        background-color: #fda417;
    }

    body {
        background-color: #f1f3f5;
        direction: rtl;
    }
</style>

<div class="orders-container">
    @foreach ($orders as $order)
    <div class="order-card">
        <h3>طلب رقم: {{$order->id}}</h3>
        <p class="order-date">التاريخ: {{ $order->created_at->format('Y-m-d') }}</p>
        <p class="order-total">إجمالي الطلب: {{ $order->total_order}} دينار</p>
        <p>الحالة: {{$order->status}}</p>
        <a href="{{route('orders.details', $order->id)}}">عرض التفاصيل</a>
    </div>
    @endforeach
</div>
@endsection

@include("auth.user.partials.header")
<style>
/* جعل جميع البطاقات بنفس الارتفاع */
.product-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* توزيع المحتوى بالتساوي */
}

/* ترتيب الأزرار والحقول في نفس السطر */
.product-card .quantity-input {
    flex: 1; /* يضمن توزيع المساحة بالتساوي */
    max-width: 100px; /* تحديد عرض أقصى للحقول */
}

.product-card form {
    display: flex;
    gap: 10px; /* مساحة بين الحقل والزر */
    align-items: center;
}

@media (max-width: 768px) {
    .product-card form {
        flex-direction: column; /* ترتيب عمودي للشاشات الصغيرة */
        align-items: stretch;
    }

    .quantity-input,
    .btn {
        width: 100%; /* عرض كامل للشاشات الصغيرة */
    }
}


</style>
<div class="images">
@include("auth.user.partials.navbar")

    <!-- محتوى داخلي إذا لزم -->
</div>

<div class="container" dir="rtl">
    <h1 class="text-center pt-3">المنتجات</h1>

    <!-- Form to search products -->
    <form action="{{ route('prod') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="بحث عن منتج...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">بحث</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach ($products as $product)
            @if ($product->quantity > 0)
                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}" 
                             style="max-height: 200px; object-fit: contain;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                            <p class="card-text text-right">{{ $product->description }}</p>
                            <p class="card-text text-right"><strong>السعر:</strong> {{ $product->price }} د.أ</p>
                            <div class="mt-auto">
                                <form action="{{ route('cart.store') }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" 
                                           name="quantity" 
                                           value="1" 
                                           min="1" 
                                           max="{{ $product->quantity }}" 
                                           class="form-control quantity-input">
                                    <button type="submit" class="btn btn-success" style="background-color:  #007bff;">أضف إلى السلة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>





@include("auth.user.partials.footer")

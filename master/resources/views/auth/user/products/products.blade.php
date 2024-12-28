@include("auth.user.partials.header")
<style>
    .container {
        direction: rtl; /* تأكد من أن جميع المحتويات في هذه الحاوية تظهر من اليمين لليسار */
    }
    .card-body {
        text-align: right; /* لضبط المحاذاة الصحيحة للنصوص في البطاقة */
    }
    /* تأكد من أن الحاوية تأخذ عرض الصفحة بالكامل */
    .images {
        /* background-image: url("{{ asset('assets/images/cover.webp') }}");
        background-size: cover; /* لجعل الصورة تغطي الحاوية */
        /* background-repeat: no-repeat;
        background-position: center;
        height: 400px; /* ارتفاع مناسب للصورة */
        /* width: 100vw; /* عرض كامل الشاشة */
        /* margin: 0; */
        /* padding: 0; */ */ */ */
        width:100vw;
        height: 100px;
        background-color: rgb(49, 62, 66);
    }

    /* معالجة العرض للأجهزة المختلفة */
    @media (max-width: 768px) {
        .image {
            height: 250px;
        }
    }

    @media (max-width: 480px) {
        .image {
            height: 200px;
        }
    }
</style>
<div class="images">
@include("auth.user.partials.navbar")

    <!-- محتوى داخلي إذا لزم -->
</div>

<div class="container" dir="rtl">
    <h1 class="text-center">المنتجات</h1>

    <!-- Form to search products -->
    <form action="{{ route('prod') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="بحث عن منتج...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">بحث</button>
            </div>
        </div>
    </form>

    <div class="row" >
        @foreach ($products as $product)
            @if ($product->quantity > 0)
                <div class="col-md-4 mb-4">
                    <div class="card" style="height: 100%; display: flex; flex-direction: column;">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}" 
                             style="max-height: 200px; object-fit: contain;">
                        <div class="card-body" style="display: flex; flex-direction: column;">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>السعر:</strong> {{ $product->price }}د.أ</p>
                            <div style="margin-top: auto;">
                                <form action="{{ route('cart.store') }}" method="POST"  style="display: flex; align-items: center; gap: 10px;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" 
                                           name="quantity" 
                                           value="1" 
                                           min="1" 
                                           max="{{ $product->quantity }}" 
                                           class="form-control" 
                                           style="width: 100px;">
                                    <button type="submit" class="btn btn-success">أضف إلى السلة</button>
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

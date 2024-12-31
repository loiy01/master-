<!-- resources/views/auth/user/cart/cart.blade.php -->
@include("auth.user.partials.header")


<div class="images">
    @include("auth.user.partials.navbar")
</div>

<div class="cart-container">
    <h1 class="text-center mb-4">مشترياتك</h1>
    
    @if(empty($cart) || count($cart) == 0)
        <div class="alert text-center" style="background-color: rgb(49, 62, 66); color: white;">
            <strong>السلة فارغة</strong>
        </div>
    @else
        @foreach ($cart as $productId => $details)
            <div class="cart-item">
            <div class="item-details">
            <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="item-image">

                    <h5 class="item-title">{{ $details['name'] }}</h5>
                    <div class="quantity-controls">
                        <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" 
                                   min="1" max="{{ $details['max_quantity'] }}" class="quantity-input">
                            <button type="submit" class="update-btn">تحديث</button>
                        </form>
                        <a href="{{ route('cart.remove', $productId) }}" class="remove-btn">حذف</a>
                    </div>
                    <p class="mt-2">{{ $details['price'] }} د.أ</p>
                </div>
            </div>
        @endforeach

        <div class="shipping-address mt-4">
            <h3 class="text-right">عنوان الشحن</h3>
            <input type="text" name="delivery_location" id="delivery_location" 
                   class="form-control text-right" required placeholder="أدخل عنوان الشحن">
        </div>

        <button onclick="showConfirmation()" class="checkout-btn mt-4">الانتقال إلى الدفع</button>
    @endif
</div>

<!-- Modal -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>تأكيد الطلب</h3>
        <div id="orderSummary"></div>
        <hr>
        <div class="text-left mt-3">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="delivery_location" id="modal_delivery_location">
                <button type="submit" class="checkout-btn">تأكيد الطلب</button>
            </form>
        </div>
    </div>
</div>

<script>
function showConfirmation() {
    const address = document.getElementById('delivery_location').value;
    if (!address) {
        alert('الرجاء إدخال عنوان الشحن');
        return;
    }

    let orderDetails = '';
    @foreach($cart as $productId => $details)
        orderDetails += `
            <div class="order-item mb-2">
                <p><strong>{{ $details['name'] }}</strong></p>
                <p>الكمية: {{ $details['quantity'] }}</p>
                <p>السعر: {{ $details['price'] }} د.أ</p>
            </div>
        `;
    @endforeach

    const total = Object.values(@json($cart)).reduce((sum, item) => 
        sum + (item.price * item.quantity), 0);

    document.getElementById('orderSummary').innerHTML = `
        ${orderDetails}
        <div class="total mt-3">
            <h4>العنوان: ${address}</h4>
            <h4>المجموع الكلي: ${total} د.أ</h4>
        </div>
    `;

    document.getElementById('modal_delivery_location').value = address;
    document.getElementById('confirmationModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('confirmationModal').style.display = 'none';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('confirmationModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

@include("auth.user.partials.footer")
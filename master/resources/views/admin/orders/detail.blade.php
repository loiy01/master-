@include("admin.partials.header-admin")

<!--====== App Content ======-->
<div class="u-s-p-b-60">
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        @include("admin.partials.siadebar")
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="dash-l-r">
                                    <div>
                                        <div class="manage-o__text-2 u-c-secondary">Order
                                            #<?php echo $orderData['id'] ?></div>
                                        <div class="manage-o__text u-c-silver">Placed on
                                            <?php echo $orderData['created_at'] ?>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="manage-o">
                                    <div class="dash-l-r">
                                        <div class="manage-o__text u-c-secondary">Delivered on
                                            <?php echo $orderData['delivery_date'] ?? '26 Oct 2016' ?>
                                        </div>
                                        <div class="manage-o__icon" style="display:flex;align-items:center;">
                                            <i class="fas fa-truck u-s-m-r-5" style="padding:10px"></i>

                                            <form method="POST" action="{{ route('admin.order.updateStatus') }}" id="categoryForm">
                                            @csrf
                                            @method('PUT')
                                            <input type='text' value='{{ $orderData['id'] }}' name='id' style='visibility: hidden; display: none;'>
                                            <select class="select-box select-box--primary-style" name="status" id="categoryFilter" onchange="handleStatusChange(this)">
                                                <option value="canceled" {{ $orderData['status'] == 'canceled' ? 'selected' : '' }}>Cancelled</option>
                                                <option value="pending" {{ $orderData['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" {{ $orderData['status'] == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            </select>
                                        </form>

                                            <!-- Modal for Cancellation Reason (same as before) -->

                                        </div>
                                    </div>

                                    <!-- Order Timeline -->
                                    <div class="manage-o__timeline">
                                        <?php
                                            $finish1 = $finish2 = $finish3 = '';
                                            switch ($orderData['status']) {

                                                case 'pending':
                                                    $finish1 = $finish2 = 'timeline-l-i--finish';
                                                    break;
                                                case 'confirmed':
                                                    $finish1 = $finish2 = $finish3 = 'timeline-l-i--finish';
                                                    break;
                                            }
                                        ?>
                                        <div class="timeline-row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <div class="timeline-l-i <?php echo $finish2; ?>">
                                                        <span class="timeline-circle"></span>
                                                    </div>
                                                    <span class="timeline-text">Shipped</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <div class="timeline-l-i <?php echo $finish3; ?>">
                                                        <span class="timeline-circle"></span>
                                                    </div>
                                                    <span class="timeline-text">Delivered</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Items -->
                                    <?php foreach ($orderData->products as $item): ?>
                                    <div class='manage-o__description' style='padding-top:20px'>
                                        <div class='description__container'>
                                            <div class='description-title'><?php    echo $item['name']; ?></div>
                                        </div>
                                        <div class='description__info-wrap'>
                                            <div>
                                                <span class='manage-o__text-2 u-c-silver'>Quantity:
                                                    <span
                                                        class='manage-o__text-2 u-c-secondary'><?php    echo $item->pivot->quantity; ?></span>
                                                </span>
                                            </div>
                                            <div>
                                                <span class='manage-o__text-2 u-c-silver'>Total:
                                                    <span
                                                        class='manage-o__text-2 u-c-secondary'>$<?php    echo $item->pivot->quantity * $item['price']; ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-3">
                                        <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                                        <h2 class="dash__h2 u-s-m-b-8">{{ $orderData->user->name ?? 'No Name' }}</h2>
                                        <span class="dash__text-2">{{ $orderData->user->phone ?? 'No Phone' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                    <div class="dash__pad-3">
                                        <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                            <div class="manage-o__text-2 u-c-secondary">
                                                $<?php echo $orderData['total_order']; ?>.0
                                            </div>
                                        </div>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">location</div>
                                            <div class="manage-o__text-2 u-c-secondary">
                                                <?php echo $orderData['delivery_location']; ?>
                                            </div>
                                        </div>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">
                                                <span class="dash__text-2">Paid by Cash on Delivery</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts (same as before) -->
<script>
    function handleStatusChange(selectElement) {
        console.log(selectElement.value); // تحقق من القيمة
        if (selectElement.value === 'canceled') {
            selectElement.form.submit();
        } else {
            selectElement.form.submit();  // تأكد من أن هذا ينفذ عند تغيير الحالة
        }
    }

    // Other functions (submitCancellation, showOtherReasonInput, closeModal) remain the same
</script>

@include("admin.partials.footer")

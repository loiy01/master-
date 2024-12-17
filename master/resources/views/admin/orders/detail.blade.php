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
                                        <div class="manage-o__text-2 u-c-secondary">Order #<?php echo $orderData['id'] ?></div>
                                        <div class="manage-o__text u-c-silver">Placed on <?php echo $orderData['created_at'] ?></div>
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
                                        <div class="manage-o__text u-c-secondary">Delivered on <?php echo $orderData['delivery_date'] ?? '26 Oct 2016' ?></div>
                                        <div class="manage-o__icon" style="display:flex;align-items:center;">
                                            <i class="fas fa-truck u-s-m-r-5" style="padding:10px"></i>

                                            <form method="GET" action="/order-status" id="categoryForm">
                                                <input type='text' value='<?php echo $orderData['order_id'] ?>' name='id' style='visibility: hidden; display: none;'>
                                                <select class="select-box select-box--primary-style"
                                                    style="border-radius:6px; <?php echo $orderData['status'] == 'cancelled' ? 'background-color:red;' : '' ?>"
                                                    name="status" id="categoryFilter"
                                                    onchange="handleStatusChange(this)">
                                                    <option value="cancelled" <?php echo $orderData['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                    <option value="pending" <?php echo $orderData['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                    <option value="confirmed" <?php echo $orderData['status'] == 'confirmed' ? 'selected' : '' ?>>confirmed</option>
                                                </select>
                                            </form>

                                            <!-- Modal for Cancellation Reason (same as before) -->
                                            <div id="cancelReasonModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 30px; border-radius: 12px; width: 400px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); z-index: 1000; font-family: Arial, sans-serif;">
                                                <h3 style="margin-bottom: 20px; font-size: 20px; color: #333;">Why do you want to cancel?</h3>
                                                <form id="cancelReasonForm" action="/cancel" method="GET">
                                                    <!-- Cancellation reasons (same as before) -->
                                                    <label style="display: block; margin-bottom: 10px;">
                                                        <input type="radio" name="reason" value="Changed my mind" style="margin-right: 8px;">
                                                        Changed my mind
                                                    </label>
                                                    <!-- More reasons... -->
                                                    <div style="margin-top: 20px; text-align: right;">
                                                        <button type="button" onclick="submitCancellation()" style="background-color: #007BFF; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;">
                                                            Submit
                                                        </button>
                                                        <button type="button" onclick="closeModal()" style="background-color: #6c757d; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
                                                            Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
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
                                            <div class='description-title'><?php echo $item['name']; ?></div>
                                        </div>
                                        <div class='description__info-wrap'>
                                            <div>
                                                <span class='manage-o__text-2 u-c-silver'>Quantity:
                                                <span class='manage-o__text-2 u-c-secondary'><?php echo $item->pivot->quantity; ?></span>
                                                </span>
                                            </div>
                                            <div>
                                                <span class='manage-o__text-2 u-c-silver'>Total:
                                                    <span class='manage-o__text-2 u-c-secondary'>$<?php echo $item->pivot->quantity * $item['price']; ?></span>
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
                                        <h2 class="dash__h2 u-s-m-b-8"><?php echo $orderData->user->name; ?></h2>
                                        <span class="dash__text-2"><?php echo $orderData->user->phone; ?></span>
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
    // handleStatusChange function (same as in the original code)
    function handleStatusChange(selectElement) {
        if (selectElement.value === 'cancelled') {
            document.getElementById('cancelReasonModal').style.display = 'block';
        } else {
            selectElement.form.submit();
        }
    }

    // Other functions (submitCancellation, showOtherReasonInput, closeModal) remain the same
</script>

@include("admin.partials.footer")

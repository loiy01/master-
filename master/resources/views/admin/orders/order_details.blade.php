@include("admin.partials.header-admin")
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
                                        <div class="manage-o__text-2 u-c-secondary">Order #{{ $order->id }}</div>
                                        <div class="manage-o__text u-c-silver">Placed on {{ $order->created_at }}</div>
                                    </div>
                                    <div>
                                        <div class="manage-o__text-2 u-c-silver">Total:
                                            <span class="manage-o__text-2 u-c-secondary">${{ $order->order_total_amount_after }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="manage-o">
                                    <div class="dash-l-r">
                                        <div class="manage-o__text u-c-secondary">Delivered on {{ $order->delivery_date ?? 'Not delivered' }}</div>
                                    </div>
                                    <div class="manage-o__timeline">
                                        @php
                                            $finish1 = $order->status === 'processing' ? 'timeline-l-i--finish' : '';
                                            $finish2 = $order->status === 'shipped' ? 'timeline-l-i--finish' : '';
                                            $finish3 = $order->status === 'delivered' ? 'timeline-l-i--finish' : '';
                                        @endphp
                                        <div class="timeline-row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <div class="timeline-l-i {{ $finish1 }}">
                                                        <span class="timeline-circle"></span>
                                                    </div>
                                                    <span class="timeline-text">Processing</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <div class="timeline-l-i {{ $finish2 }}">
                                                        <span class="timeline-circle"></span>
                                                    </div>
                                                    <span class="timeline-text">Shipped</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <div class="timeline-step">
                                                    <div class="timeline-l-i {{ $finish3 }}">
                                                        <span class="timeline-circle"></span>
                                                    </div>
                                                    <span class="timeline-text">Delivered</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($order->orderItems as $item)
                            <div class="manage-o__description" style="padding-top:20px">
                                <div class="description__container">
                                    <div class="description-title">{{ $item->product_name }}</div>
                                </div>
                                <div class="description__info-wrap">
                                    <div>
                                        <span class="manage-o__text-2 u-c-silver">Quantity:
                                            <span class="manage-o__text-2 u-c-secondary">{{ $item->quantity }}</span>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="manage-o__text-2 u-c-silver">Total:
                                            <span class="manage-o__text-2 u-c-secondary">${{ $item->quantity * $item->product_price }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admin.partials.footer")


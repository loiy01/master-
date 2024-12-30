@include("admin.partials.header-admin")
<div class="app-content">
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            @include('admin.partials.siadebar')
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-10">Dashboard</h1>


                                    <span class="dash__text u-s-m-b-30">From your My Account Dashboard you have the
                                        ability to view a snapshot of your recent account activity and update your
                                        account information. Select a link below to view or edit information.</span>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30" style="text-align:center;">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h1 u-s-m-b-8"
                                                        style="text-align:center;font-size:30px">Total Sales</h2>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                        <a href="dash-edit-profile.html"></a>
                                                    </div>

                                                    <h1 class="dash__h1 u-s-m-b-10"
                                                        style='font-size:40px;padding-top:24px'>
                                                        {{$totalSales}}
                                                    </h1>


                                                    <br>
                                                    <span class="dash__text">From
                                                        <?php echo date('Y-m-d', strtotime('-30 days')); ?></span>
                                                    <div class="dash__link dash__link--secondary u-s-m-t-8">

                                                        <!-- <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30" style="text-align:center;">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h1 u-s-m-b-8"
                                                        style="text-align:center;font-size:28px">Total Customers</h2>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                    </div>
                                                    <h1 class="dash__h1 u-s-m-b-10"
                                                        style='font-size:40px;padding-top:24px'><?php
                                                        ?> {{$totalCustomers}}</h1>
                                                    <span class="dash__text"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30" style="text-align:center;">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h1 u-s-m-b-8"
                                                        style="text-align:center;font-size:28px">Messages</h2>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                    </div>
                                                    <h1 class="dash__h1 u-s-m-b-10"
                                                        style='font-size:40px;padding-top:24px'><?php
                                                        ?> {{ $totalMessages}} </h1>
                                                    <span class="dash__text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
                                <div class="dash__table">
                                    <table class="dash__table">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>user name</th>
                                                <th>Placed On</th>
                                                <th>Order Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->user ? $order->user->name : 'No User' }}</td>
                                                    <td>{{$order->delivery_location}}</td>

                                                    <td>
                                                        <span
                                                            style="background-color: orange; color: white; padding: 3px 6px; border-radius: 4px;">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $order->total_order}}
                                                        <form method='GET' action={{route('admin.orders.show', $order->id)}}>
                                                            <input type='text' value={{$order->id}} name='id'
                                                                style='visibility: hidden;display: none;'>
                                                            <button type='submit'
                                                                class='address-book-edit btn--e-transparent-platinum-b-2'
                                                                style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination" style="display: flex; justify-content: center;">
                                        {{$orders->links('pagination::bootstrap-4')}}
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


@include("admin.partials.footer")
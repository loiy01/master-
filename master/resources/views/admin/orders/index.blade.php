@include("admin.partials.header-admin")

<!--====== End - Main Header ======-->


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-20">

        <!--====== Section Content ======-->
        
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            
                            @include("admin.partials.siadebar")

                            
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Orders</h1>


                                    <form method="GET" action="{{ route('admin.order.index') }}">
                                        <select name="status" style="width:200px" class="form-control" onchange="this.form.submit()">
                                            <option value="">all</option>
                                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                                <table class="dash__table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>user_name</th>
                                                            <th>Placed On</th>
                                                            <th>Order Status</th>
                                                            <th>Total</th>

                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $order )
                                                        <tr>
                                                            <th>{{ $order->id }}</th>
                                                            <th>{{ $order->user ? $order->user->name : 'No User' }}</th>
                                                            <th>{{ $order->created_at}}</th>
                                                            <th>{{ $order->status}}</th>
                                                            <th>{{ $order->total_order}}
                                                            <form method='GET' action={{route('admin.orders.show',$order->id)}} >
                                                                        <input type='text'  value={{$order->id}} name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                            </th>



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
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
@include("admin.partials.footer")

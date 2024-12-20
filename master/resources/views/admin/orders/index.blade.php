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

                                    <span class="dash__text u-s-m-b-30">Here you can see all products that have been
                                        delivered.</span>

                                        <div class="dash__filter">
                                                <form method="GET" action="/deliveryStatus" id="categoryForm">
                                                    <select class="select-box select-box--primary-style" style="border-radius:6px" name="id" id="categoryFilter" onchange="this.form.submit()">
                                                        <option value="all">All Orders</option>
                                                           <option value="processing" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'processing' ? 'selected' : '' ?>>
                                                                Processing
                                                            </option>
                                                            <option value="shipped" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'shipped' ? 'selected' : '' ?>>
                                                                Shipped
                                                            </option>
                                                            <option value="delivered" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'delivered' ? 'selected' : '' ?>>
                                                                Delivered
                                                            </option>
                                                            <option value="cancelled" 
                                                                <?= isset($_GET['id']) && $_GET['id'] == 'cancelled' ? 'selected' : '' ?>>
                                                                Cancelled
                                                            </option>
                                                    </select>
                                                </form>
                                            </div>
                                   
                                                <table class="dash__table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>user_id</th>
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
                                                            <form method='GET' >
                                                                        <input type='text' value={{$order->id}} name='id' style='visibility: hidden;display: none;'>
                                                                        <button type='submit' class='address-book-edit btn--e-transparent-platinum-b-2' style='border:0;color:#ff4500'><a>MANAGE</a></button>
                                                                    </form>
                                                            </th>



                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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

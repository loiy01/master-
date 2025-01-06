@php
    use App\Models\Admin;
@endphp
<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                            <ul class="dash__f-list">
                                                <li>
                                                <a href="{{route('admin.dashboard')}}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/icons8-dashboard-16.png" alt="">
                                                              <p>Dashboard</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.products.index') }}">
                                                        <div class="admin_list">
                                                            <div class="admin_list_div">
                                                                <img class="dash_img" src="{{ asset('assets') }}/images/icons8-opened-folder-50.png" alt="">
                                                                <p>Products</p>
                                                            </div>
                                                            <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                        </div>
                                                    </a>
                                                </li>

                                                                                            
                                                 <li>
                                                <a href="{{ route('admin.categories.index') }}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div">
                                                            <img class="dash_img"  src="{{ asset('assets') }}/images/icons8-opened-folder-50.png" alt="">
                                                            <p>Categories</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                            </li>
                                                
                                            @if(Auth::check() && Admin::where('id', Auth::id())->value('is_super') == 1)
                                                        <li>
                                                        <a href="{{ route('admin.admin.index') }}">
                                                            <div class="admin_list">
                                                                <div class="admin_list_div" >
                                                                      <img class="dash_img"  src="{{ asset('assets') }}/images/administrator.png" alt="">
                                                                      <p>Admins</p>
                                                                </div>
                                                                <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                            </div>
                                                        </a>
                                                        </li>
                                                        @endif
                                                
                                                
                                                <li>
                                                <a href={{ route('admin.order.index') }}>
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/box_2.png" alt="">
                                                              <p>Orders</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{route('admin.user.index')}}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/icons8-customer-16.png" alt="">
                                                              <p>Customers</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{route('admin.message.index')}}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/email.png" alt="">
                                                              <p>Messages</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{route('admin.mainteance_requests.index')}}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/edit.png" alt="">
                                                              <p>mainteance_requests</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{route('admin.appointments.index')}}">
                                                    <div class="admin_list">
                                                        <div class="admin_list_div" >
                                                              <img class="dash_img"  src="{{ asset('assets') }}/images/edit.png" alt="">
                                                              <p>appointment</p>
                                                        </div>
                                                        <img style="width:12px" src="/public/images/angle-right.png" alt="">
                                                    </div>
                                                </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logut</a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   
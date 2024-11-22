@include('admin.partials.header-admin')

<!--====== End - Main Header ======-->

<br>
<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            @include('admin.partials.siadebar')
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14" style="padding-bottom: 10px;">Add New Admin</h1>

                                    <form class="dash-address-manipulation" method="POST" action="{{ route('admin.admin.store') }}">
                                        @csrf
                                        <input type="hidden" name="is_active" value="1">
                                        <input type="hidden" name="is_super" value="0">

                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="admin-name">Name *</label>
                                                <input class="input-text input-text--primary-style" name="name" type="text" id="admin-name" placeholder="Enter name" required>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="admin-email">Email *</label>
                                                <input class="input-text input-text--primary-style" name="email" type="email" id="admin-email" placeholder="Enter email" required>
                                            </div>
                                        </div>

                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="admin-password">Password *</label>
                                                <input class="input-text input-text--primary-style" name="password" type="password" id="admin-password" placeholder="Enter password" required>
                                            </div>
                                        </div>

                                        <button class="btn btn--e-brand-b-2" type="submit">Add</button>
                                    </form>
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

@include('admin.partials.footer')

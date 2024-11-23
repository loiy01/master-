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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Users</h1>
                                    
                                       

                                    <div class="dash__table">
                                        <table class="dash__table">
                                            <thead>
                                                <tr>
                                                    <th>email</th> <!-- عمود جديد للصورة -->
                                                    <th>message subject</th>
                                                    <th>messege text</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($messages as $message)
                                                    <tr>
                                                        <!-- عرض الصورة -->
                                                        <td>{{ $message->email}}</td>
                                                        <td>{{ $message->message_subject }}</td>
                                                        <td>{{ $message->message_text}}</td>
                                                       
                                                       
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

@include("admin.partials.footer")

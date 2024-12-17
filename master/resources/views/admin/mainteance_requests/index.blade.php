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
                                    <h1 class="dash__h1 u-s-m-b-14">mainteance_requests</h1>
                                    
                                       

                                    <div class="dash__table">
                                        <table class="dash__table">
                                            <thead>
                                                <tr>
                                                    <th>id</th> <!-- عمود جديد للصورة -->
                                                    <th>manufacturer_name</th>
                                                    <th>user_name</th>
                                                    <th>user phone</th>
                                                    <th>desciption</th>
                                                    <th>actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mainteances as $main)
                                                    <tr>
                                                        <!-- عرض الصورة -->
                                                        <td>{{ $main->id}}</td>
                                                        <td>{{ $main->manufacturer_name }}</td>
                                                        <td>{{ $main->user ? $main->user->name : 'No User' }}</td>
                                                        <td>{{ $main->user ? $main->user->phone : 'No phone' }}</td>
                                                        <td>{{ $main->description}}</td>
                                                        <td style="display: flex; justify-content: center;">
                                                        <form action="{{ route('admin.maintance_requests.toggleStatus', $main->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm {{ $main->show ? 'btn-danger' : 'btn-success' }}">
                                                                {{ $main->show ? 'show' : 'new' }}
                                                            </button>
                                                        </form>
                                                        </td>
                                                        
                                                       
                                                    <td>
                                                    
                                                        
                                                    </td>   
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

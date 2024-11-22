@include("admin.partials.header-admin")

    <!-- Section for Categories -->
    <div class="app-content">
        <div class="u-s-p-b-60">
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-3 col-md-12">

                            @include('admin.partials.siadebar')
                                
                                <div>
                                    <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('admin.admin.create') }}">
                                        <i class="fas fa-plus u-s-m-r-8"></i>
                                        <span>Add New Admin</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Main Content Area for Category Table -->
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="dash__address-header">
                                            <h1 class="dash__h1">Admin</h1>
                                        </div>
                                    </div>

                                    <div class="dash__table">
                                        <table class="dash__table">
                                            <thead>
                                                <tr>
                                                    <th>Admin Name</th>
                                                    <th>Email</th>
                                                    <th>Is Active</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                    <tr>
                                                        <td>{{ $admin->name }}</td>
                                                        <td>{{ $admin->email }} </td>
                                                        <td>{{ $admin->is_active }} </td>                                                      
                                                        <td style="display: flex; justify-content: center;">
                                                        <form action="{{ route('admin.admin.toggleStatus', $admin->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm {{ $admin->is_active ? 'btn-danger' : 'btn-success' }}">
                                                                {{ $admin->is_active ? 'Deactivate' : 'Activate' }}
                                                            </button>
                                                        </form>
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
    @include("admin.partials.footer")

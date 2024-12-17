@include("admin.partials.header-admin")
<!-- Section for Appointments -->
<div class="app-content">
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar for Dashboard Links -->
                        <div class="col-lg-3 col-md-12">
                            <!--====== Dashboard Features ======-->
                            @include('admin.partials.siadebar')
                            <!--====== End - Dashboard Features ======-->
                        </div><!-- Main Content Area for Appointments Table -->
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                            <div class="dash__pad-2">
                                <
                            </div>

                            <div class="dash__table">
                                <table class="dash__table">
                                    <thead>
                                        <tr>
                                            <th>Appointment ID</th>
                                            <th>User name</th>
                                            <th>Appointment Time</th>
                                            <th>phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->id }}</td>
                                                <td>{{ $appointment->users->name }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->users->phone }}</td>

                                                <td style="display: flex; justify-content: center;">
                                                        <form action="{{ route('admin.appointments.toggleStatus', $appointment->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm {{ $appointment->show ? 'btn-danger' : 'btn-success' }}">
                                                                {{ $appointment->show ? 'show' : 'new' }}
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
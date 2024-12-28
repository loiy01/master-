@include("admin.partials.header-admin")

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
                                    <!-- إضافة الفلتر هنا بدون زر Submit -->
                                    <form action="{{ route('admin.appointments.index') }}" method="GET">
                                        <label for="show" class="u-s-m-r-10">Appointments</label>
                                        <select name="show" id="show" class="form-control" style="display: inline-block; width: auto;" onchange="this.form.submit()">
                                            <option value="">All</option>
                                            <option value="0" {{ request('show') == '0' ? 'selected' : '' }}>Not Seen</option>
                                            <option value="1" {{ request('show') == '1' ? 'selected' : '' }}>Seen</option>
                                        </select>
                                    </form>
                                </div>

                                <div class="dash__table">
                                    <table class="dash__table">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>User name</th>
                                                <th>Appointment Time</th>
                                                <th>Service Type</th>
                                                <th>Appointment Description</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
                                                    <td>{{ $appointment->users ? $appointment->users->name : 'No User' }}</td>
                                                    <td>{{ $appointment->time }}</td>
                                                    <td>{{ $appointment->service_type }}</td>
                                                    <td>{{ $appointment->description }}</td>
                                                    <td>{{ $appointment->users ? $appointment->users->phone : 'No Phone' }}</td>
                                                    <td style="display: flex; justify-content: center;">
                                                        <form action="{{ route('admin.appointments.toggleStatus', $appointment->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm {{ $appointment->show ? 'btn-danger' : 'btn-success' }}">
                                                                {{ $appointment->show ? 'Show' : 'New' }}
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

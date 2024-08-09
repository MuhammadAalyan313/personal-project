@include('Admin/partials/header')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Admin/partials/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Admin.partials.navbar')
                <!-- End of Topbar -->

                <div class="container border p-4">
                    <!--  -->
                <h2 class="mb-4">Lead Details</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>{{ $lead->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{ $lead->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $lead->email }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $lead->title }}</td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td>{{ $lead->company }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $lead->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td>{{ $lead->message }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $lead->address }}</td>
                                </tr>
                                <tr>
                                    <td>Lead Source</td>
                                    <td>{{ $lead->lead_source }}</td>
                                </tr>
                                <tr>
                                    <td>Lead Status</td>
                                    <td>{{ $lead->lead_status }}</td>
                                </tr>
                                <tr>
                                    <td>Assigned To</td>
                                    <td>{{ $lead->assignedTo->username }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    @if($lead->status == 'accepted')
                                    <td><button class="btn btn-success">{{ $lead->status }}</button></td>
                                    @elseif($lead->status == 'declined')
                                    <td><button class="btn btn-danger">{{ $lead->status }}</button></td>
                                    @else
                                    <td><button class="btn btn-info">{{ $lead->status }}</button></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href=" " class="btn btn-primary mt-3">Export to PDF</a>
                    <a href="{{ route('show.leads') }}" class="btn btn-primary mt-3">Back</a>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('Admin/partials/footer')
    <!-- End of Footer -->
</body>

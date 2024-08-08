@include('Admin/partials/header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Admin/partials/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Admin.partials.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid p-4 mt-5 text-center" style="display: flex; flex-direction: column; align-items: center;">
    <div class="mb-14" style="margin-right:95%">
        <a href="{{ route('show.leads') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Address</th>
                    <th>Lead Source</th>
                    <th>Lead Status</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
                @if(!$users)
                <tr>
                    <td colspan="12" class="text-center">
                        No Data Available..!
                    </td>
                </tr>
                @endif
            </thead>
            <tbody>
                @foreach ($users as $lead)
                <tr style="white-space: nowrap">
                    <td>{{ $lead->first_name }}</td>
                    <td>{{ $lead->last_name }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->title }}</td>
                    <td>{{ $lead->company }}</td>
                    <td>{{ $lead->phone }}</td>
                    <td>{{ $lead->message }}</td>
                    <td>{{ $lead->address }}</td>
                    <td>{{ $lead->lead_source }}</td>
                    <td>{{ $lead->lead_status }}</td>
                    <td>{{ $lead->assigned_user->username }}</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('restore.lead', ['id' => $lead->id])}}" class="btn btn-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                                <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.8 6.8 0 0 0 1.16 8z"/>
                                <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                <!-- End of Page Content -->
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('Admin/partials/footer')
            <!-- End of Footer -->

        </div>
    </div>
</body>

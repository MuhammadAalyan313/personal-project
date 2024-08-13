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
                    <h2 class="mb-4">Employee Attendance</h2>
                    <div class="table-responsive">
                        <form action="{{ route('check.in') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Check In</button>
                        </form>
                        <!-- Check-Out Button -->
                        <form action="{{ route('check.out', ['id' => Auth::user()->id]) }}" method="POST" class="mt-3">
                            @csrf

                            <button type="submit" class="btn btn-danger">Check Out</button>
                        </form>


                    </div>
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
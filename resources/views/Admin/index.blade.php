@include('Admin/partials/header')



<body id="page-top">
    @if(Session::has('message'))
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        toastr.success("{{ Session::get('message') }}");
    });
    </script>
    @endif

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->



                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between text-right!" style="width:100%!; height: 400px; text-align:right;">
                                    <h1 class="m-0 font-weight-bold text-primary" style="text-align:center!">Oops.... Role Not Found</h1>
                                </div>
                              <div class="404"><a href="{{ route('logout') }}"><button class="btn btn-primary">Go Back</button></a></div>

                                <!-- Card Body -->
                            </div>
                        </div>

                        <!-- Pie Chart -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          @include('Admin/partials/footer')
            <!-- End of Footer -->


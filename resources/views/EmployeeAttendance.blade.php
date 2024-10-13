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
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">TimeIn</th>
      <th scope="col">TimeOut</th>
      <th scope="col">Total Hours</th>
      <th scope="col">Time Count</th>
    </tr>
  </thead>
  <tbody>
   @foreach($attendance as $att)
   <tr>
      <th scope="row">{{ $att->id }}</th>
      <td>{{ $user->username }}</td>
      <td>{{ $att->check_in }}</td>
      <td>{{ $att->check_out }}</td>
      <td>{{ $att->total_hours }}</td>
      <td><div></div></td>
    </tr>
   @endforeach
  </tbody>
</table>
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
<script>
    var
</script>
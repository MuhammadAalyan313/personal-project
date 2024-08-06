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

                <!-- Begin Page Content -->
                <div class="container border p-4">
                  <form action="{{route('create.lead')}}" method="post">
               @if(session('alert'))
               {!! ('alert') !!}
               @endif
                    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Company</label>
      <input type="text" name="company" class="form-control" id="company" placeholder="Enter Company name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone</label>
      <input type="phone" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Message</label>
      <input type="text" name="message" class="form-control" id="message" placeholder="Enter Message">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Address</label>
      <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
    </div>
  </div>
  @php
      $leadSource = array('Social Media', 'Search', 'Advertising', 'Direct');
      $leadStatus = array('Qualification', 'Need Analysis', 'Proposal/Price Quote', 'Negotiation', 'Closed Won', 'Closed Lost');
  @endphp
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Lead Source</label>
      <select id="inputState" class="form-control" name="lead_source">
        <option selected>Choose...</option>
        @foreach ( $leadSource as $source )
        <option value="{{ $source }}">{{$source}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Lead Status</label>
      <select id="inputState" class="form-control" name="lead_status">
        <option selected>Choose...</option>
        @foreach ( $leadStatus as $status)
        <option value="{{ $status }}">{{$status}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Assign To:</label>
      <select id="inputState" class="form-control" name="assigned_to">
        <option selected>Choose...</option>
        @foreach ( $users as $user)
        <option value="{{ $user->id }}">{{$user->username}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('show.leads') }}" class="btn btn-primary">Back</a>
</form>


          </div>


            </div>
            </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          @include('Admin/partials/footer')
            <!-- End of Footer -->
        </body>
       
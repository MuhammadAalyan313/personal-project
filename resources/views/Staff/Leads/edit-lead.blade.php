
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
                @if(Session::has('message'))
              <div class="alert alert-success alert-dismissible" role="alert">
                  {{ Session::get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
                <form action="{{route('update.lead', ['id' => $lead->id])}}" method="post">
                    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" value="{{$lead->first_name}}" class="form-control" id="first_name" placeholder="First Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="{{$lead->last_name}}" id="last_name" placeholder="Last Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" value="{{$lead->email}}" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Title</label>
      <input type="text" name="title" class="form-control" value="{{$lead->title}}" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Company</label>
      <input type="text" name="company" class="form-control"value="{{$lead->company}}" id="company" placeholder="Enter Company name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone</label>
      <input type="phone" name="phone" class="form-control" value="{{$lead->phone}}" id="phone" placeholder="Enter Phone Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Message</label>
      <input type="text" name="message" class="form-control" value="{{$lead->message}}" id="message" placeholder="Enter Message">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Address</label>
      <input type="text" name="address" class="form-control" value="{{$lead->address}}" id="address" placeholder="Enter Address">
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
        <option selected>{{$lead->lead_source}}</option>
        @foreach ( $leadSource as $source )
        <option value="">{{$source}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Lead Status</label>
      <select id="inputState" class="form-control" name="lead_status">
        <option selected>{{$lead->lead_status}}</option>
            @foreach ( $leadStatus as $status )
        <option value="{{$status}}">{{$status}}</option>
            @endforeach
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Assign To:</label>
      <select id="inputState" class="form-control" name="assigned_to">
        <option selected></option>
        @foreach ( $users as $user )
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

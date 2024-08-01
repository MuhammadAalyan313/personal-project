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
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <form action="{{ route('update.photo', ['id' => $data->id ]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="text-center">
                                                <!-- Blade View -->
                                                <img id="avatarPreview"
         src="{{ $data->photo ? asset('img/' . $data->photo) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp'}} "alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">

                                                <input type="file" name="photo" class="form-control mt-3"
                                                    id="avatarInput" required>
                                                <h5 class="my-3">{{ $data->username }}</h5>
                                                <p class="text-muted mb-1">{{ $data->address }}</p>
                                                <div class="d-flex justify-content-center mb-2">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-outline-primary ms-1">Save</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="card mb-4 mb-lg-0">
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush rounded-3">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fas fa-globe fa-lg text-warning"></i>
                                                <p class="mb-0">https://mdbootstrap.com</p>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-github fa-lg text-body"></i>
                                                <p class="mb-0">mdbootstrap</p>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                                <p class="mb-0">@mdbootstrap</p>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                                <p class="mb-0">mdbootstrap</p>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                                <p class="mb-0">mdbootstrap</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form action="{{ route('update.profile', ['id' => $data->id ]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <label for="username" class="mb-0">Full Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Full Name"
                                                        value="{{ old('username', $data->username) }}" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <label for="email" class="mb-0">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" value="{{ old('email', $data->email) }}"
                                                        required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <label for="phone" class="mb-0">Phone</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        placeholder="Phone" value="{{ old('phone', $data->phone) }}"
                                                        required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <label for="address" class="mb-0">Address</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Address"
                                                        value="{{ old('address', $data->address) }}" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body">
                                                <p class="mb-4"><span
                                                        class="text-primary font-italic me-1">assigment</span> Project
                                                    Status</p>
                                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%"
                                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 89%"
                                                        aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 55%"
                                                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                                <div class="progress rounded mb-2" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 66%"
                                                        aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body">
                                                <p class="mb-4"><span
                                                        class="text-primary font-italic me-1">assigment</span> Project
                                                    Status</p>
                                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%"
                                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 89%"
                                                        aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                                <div class="progress rounded" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 55%"
                                                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                                <div class="progress rounded mb-2" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 66%"
                                                        aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('Admin/partials/footer')
    <!-- End of Footer -->
</body>

@if(Session::has('message'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Message',
        text: "{{ Session::get('message') }}",
        icon: "{{ Session::get('alert-type')}}",
        confirmButtonText: 'OK',
        timer: 3000
    });
});
</script>
@endif
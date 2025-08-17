@extends('layouts.userlayout')
@section('content')
    {{-- new code starts here --}}
    <div class="row">
        <div class="col-12 m-2">
            <x-errorshow />
        </div>
        <div class="col">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1 mx-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple"
                            role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fa fa-address-card text-danger me-2"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab"
                            aria-controls="dashboard" aria-selected="false">
                            <i class="fa fa-unlock text-danger me-2"></i> Password Settings
                        </a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col mx-3 mt-2 rounded">
                        <div class="tab-content">
                            {{-- this is for profile --}}
                            <div class="tab-pane fade show active shadow-lg mt-4 p-3" id="profile-tabs-simple"
                                role="tabpanel">
                                <form action="{{ route(Auth::user()->role . '.updateProfile') }}" method="POST">
                                    @csrf

                                    <h4 class="mb-4">My Account</h4>
                                    <div class="row align-items-center p-3 rounded shadow-lg mb-4">
                                        <div class="col-md-1 text-center">
                                            <span class="avatar avatar-md text-white bg-gradient-dark">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <div class="col-md-11">
                                            <h5 class="card-title">Edit Profile Details</h5>
                                            <div class="small my-2">
                                                {{ Auth::user()->email }}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Role</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ Auth::user()->role }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Company</label>
                                                <input type="text" name="company" class="form-control"
                                                    value="{{ $company->name }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal for changing profile -->
                                    <div class="modal fade" id="x1" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="modal-status bg-primary"></div>
                                                <div class="modal-body text-center py-4">
                                                    <i class="text-primary fs-1 fa fa-key p-5"></i>
                                                    <h5 class="mb-4">
                                                        Enter password to confirm changes
                                                    </h5>

                                                    <div class="mb-3">
                                                        <!-- <label class="form-label">Password</label> -->
                                                        <div class="input-group input-group-static mb-4">
                                                            <input type="password" id="password" class="form-control"
                                                                name="password" placeholder="Password" autocomplete="off">
                                                            <x-password-toggle />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                    Cancel
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit" class="btn btn-primary w-100">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="card-footer bg-transparent mt-auto">
                                    <div class="btn-list justify-content-end">
                                        <a href="#" class="btn btn-1"> Cancel </a>
                                        <a href="#" class="btn btn-primary btn-2" data-bs-toggle="modal"
                                            data-bs-target="#x1">
                                            Submit </a>
                                    </div>
                                </div>

                            </div>

                            {{-- this is for password change --}}
                            <div class="tab-pane fade shadow-lg mt-4 p-3" id="dashboard-tabs-simple" role="tabpanel">
                                <form action="{{ route(Auth::user()->role . '.changePassword') }}" method="POST">
                                    @csrf
                                    <h4 class="mb-4">Change Password</h4>
                                    <h5 class="card-title">~</h5>

                                    <input type="hidden" id="active-tab-id"
                                        value="{{ session('active_tab', 'tabs-home-9') }}">

                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-label">Current Password</div>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label">New Password</div>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label">Confirm Password</div>
                                            <input type="password" name="new_password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    <div class="card-footer bg-transparent mt-auto">
                                        <div class="btn-list justify-content-end">
                                            <a href="#" class="btn btn-1"> Cancel </a>
                                            <a href="#" class="btn btn-primary btn-2" data-bs-toggle="modal"
                                                data-bs-target="#x2">
                                                Change </a>
                                        </div>
                                    </div>

                                    <!-- modal for changing password -->
                                    <div class="modal fade" id="x2" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="modal-status bg-primary"></div>
                                                <div class="modal-body text-center py-4">
                                                    <i class="text-primary fa fa-circle-exclamation p-4 fs-1"></i>
                                                    <h5 class="mb-4">
                                                        Caution !
                                                    </h5>
                                                    <p class="mb">
                                                        Are you sure you want to change your password !?
                                                    </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="#" class="btn w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Cancel
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit" class="btn btn-primary w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Change
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection

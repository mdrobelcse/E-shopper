@extends('layouts.backend.app')


@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <a href="https://wrappixel.com/templates/materialpro/" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"> Upgrade to Pro</a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->

        <!-- Row -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <!-- Column -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('backend/assets/images/background/profile-bg.jpg') }}" alt="Card image cap">
                    <div class="card-block little-profile text-center">
                        <div class="pro-img">

                            @if(Auth::user()->image == 'default.png')

                            <img src="{{ url('storage/admin_profile/default.jpeg') }}" alt="user" />


                            @else

                                <img src="{{ url('storage/admin_profile/'.Auth::user()->image) }}" alt="user" />

                            @endif


                        </div>
                        <h3 class="m-b-0">{{ Auth::user()->name }}</h3>
                        <p>Web Designer &amp; Developer</p>

                    </div>
                </div>
                <!-- Column -->

            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#update_profile" role="tab">Update Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#change_password" role="tab">Change Password</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="update_profile" role="tabpanel">
                            <div class="card-block">
                                <form action="{{ route('admin.profile.update') }}" class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                                    @csrf
                                   @method('PUT')
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="name" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="text"  class="form-control form-control-line" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Image</label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="address" value="{{ Auth::user()->address }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">About</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="about">{{ Auth::user()->about }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--second tab-->

                        <div class="tab-pane" id="change_password" role="tabpanel">
                            <div class="card-block">
                                <form action="{{ route('admin.password.update') }}" class="form-horizontal form-material" method="post">
                                   @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="col-md-12">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line" id="old_password" name="old_password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirm Password</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line" id="confirm_password" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection
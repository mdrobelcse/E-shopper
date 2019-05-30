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
                    <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-wrap">
                                    <div>
                                        <h3 class="card-title">Sales Overview</h3>
                                        <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6> </div>
                                    <div class="ml-auto">
                                        <ul class="list-inline">
                                            <li>
                                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Ample</h6> </li>
                                            <li>
                                                <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Pixel</h6> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="amp-pxl" style="height: 360px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-block">
                        <h3 class="card-title">Our Visitors </h3>
                        <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                        <div id="visitor" style="height:290px; width:100%;"></div>
                    </div>
                    <div>
                        <hr class="m-t-0 m-b-0">
                    </div>
                    <div class="card-block text-center ">
                        <ul class="list-inline m-b-0">
                            <li>
                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Mobile</h6> </li>
                            <li>
                                <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Desktop</h6> </li>
                            <li>
                                <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Tablet</h6> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- Row -->

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>


@endsection
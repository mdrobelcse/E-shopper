@extends('layouts.backend.app')

@push('css')



@endpush

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Update District</li>
                </ol>
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

            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material" action="{{ route('admin.district.update',$district->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">District Name:</label>
                                <div class="col-md-12">
                                    <input type="text" name="district_name" value="{{ $district->district_name }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Division Name:</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name="division">

                                        <option selected disabled="">Select Division</option>

                                        @foreach($divisions as $division)

                                            <option {{ $district->div_id == $division->id ? 'selected': ''  }} value="{{ $division->id }}">{{ $division->division_name }}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.district.index') }}" class="btn btn-info">Back</a>
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>


@endsection

@push('js')



@endpush
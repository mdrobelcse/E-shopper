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
                    <li class="breadcrumb-item active">Update Payment method</li>
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
                        <form class="form-horizontal form-material" action="{{ route('admin.payment.update',$payment_method) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="col-md-12">Payment Name:</label>
                                <div class="col-md-12">
                                    <input type="text" name="payment_name" value="{{ $payment_method->payment_name }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Account Type:</label>
                                <div class="col-md-12">
                                    <input type="text" name="account_type" value="{{ $payment_method->account_type }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Account Number:</label>
                                <div class="col-md-12">
                                    <input type="text" name="number" value="{{ $payment_method->number }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Description:</label>
                                <div class="col-md-12">
                                    <textarea name="description" class="form-control form-control-line">{{ $payment_method->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.payment.index') }}" class="btn btn-info">Back</a>
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
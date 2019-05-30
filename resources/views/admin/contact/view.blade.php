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
                    <li class="breadcrumb-item active">Edit Category</li>
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

                            <div class="form-group">
                                <label class="col-md-12">Name:</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control form-control-line" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">E-mail:</label>
                                    <div class="col-md-12">
                                       <input type="text" name="email" value="{{ $contact->email }}" class="form-control form-control-line" readonly>
                                   </div>
                            </div>

                           <div class="form-group">
                               <label class="col-md-12">Subject:</label>
                                   <div class="col-md-12">
                                      <input type="text" name="subject" value="{{ $contact->subject }}" class="form-control form-control-line" readonly>
                                  </div>
                           </div>

                           <div class="form-group">
                               <label class="col-md-12">Message:</label>
                               <div class="col-md-12">
                                   <textarea  rows="8" name="message" class="form-control form-control-line" readonly>{{ $contact->message }}</textarea>
                               </div>
                           </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.contact.index') }}" class="btn btn-info">Back</a>
                                </div>
                            </div>

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
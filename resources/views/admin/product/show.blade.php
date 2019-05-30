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
                    <li class="breadcrumb-item active">Show product</li>
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
                                <label class="col-md-12">Product Title:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="title" value="{{ $product->title }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Product Quantity:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="quantity" value="{{ $product->quantity }}" id="example-email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product Price:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="price" value="{{ $product->price }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Product Category:</label>
                                   <div class="col-md-12">
                                   <input type="text" class="form-control form-control-line" name="price" value="{{ $product->category_id }}" readonly="">
                                </div>
                            </div>

                           <div class="form-group">
                               <label class="col-md-12">Product Brand:</label>
                              <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="price" value="{{ $product->brand_id }}" readonly="">
                             </div>
                           </div>

                        <div class="form-group">
                            <label class="col-md-12">Product Brand:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="price" value="{{ $product->type == '1' ? 'feature' : 'non-feature' }}" readonly="">
                            </div>
                        </div>

                            <div class="form-group">
                                <label class="col-md-12">Product Image:</label>
                                <div class="col-md-12">
                                    <img class="img-thumbnail" src="{{ url('storage/product/'.$product->image) }}" alt="{{ $product->title }}" height="200px" width="250px">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Product Description:</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="description" readonly>{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-info">Back</a>
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
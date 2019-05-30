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
                    <li class="breadcrumb-item active">Edit product</li>
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
                        <form action="{{ route('admin.product.update',$product->id) }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="col-md-12">Product Title:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="title" value="{{ $product->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Product Quantity:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="quantity" value="{{ $product->quantity }}" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product Price:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="price" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Category:</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="category">

                                        <option selected disabled>Select one</option>

                                        @foreach($categories as $category)

                                            <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Brand:</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="brand">

                                        <option selected disabled>Select one</option>

                                        @foreach($brands as $brand)

                                            <option {{ $product->brand_id == $brand->id ? 'selected' :'' }} value="{{ $brand->id }}">{{ $brand->name }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Product Image:</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control form-control-line" name="image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select type:</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="type">
                                        <option selected disabled>Select one</option>
                                        <option {{ $product->type == 0 ? 'selected' : '' }} value="0">Non featured</option>
                                        <option {{ $product->type == 1 ? 'selected' : '' }} value="1">featured</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Product Description:</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-info">Back</a>
                                    <button class="btn btn-success">Update</button>
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
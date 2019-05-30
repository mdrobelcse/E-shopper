@extends('layouts.frontend.app')


@section('slider')

    @include('layouts.frontend.partials.slider')

@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('frontend.category_brand.index')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">All products</h2>




                        @if($products->count() > 0)

                        @foreach($products as $key=>$product)


                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ url('storage/product/'.$product->image) }}" height="200px" width="130px" alt="" / >
                                            <h2>${{ $product->price }}</h2>
                                            <p>{{ $product->title }}</p>
                                            <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>view details</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{ $product->price }}</h2>
                                                <p>{{ $product->title }}</p>
                                                <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>view details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        @endforeach


                        @else


                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">

                                        <div class="productinfo text-center">
                                            <h3>Product not available in this moments</h3>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        @endif





                    </div><!--features_items-->


                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">

                                @php $active = 1 @endphp


                                @if($categories->count() > 0)

                                @foreach($categories as $category)

                                    <li class="{{ $active == 1 ? 'active' : '' }}"><a href="#{{ $category->id }}" data-toggle="tab">{{ $category->name }}</a></li>

                                    @php $active++ @endphp

                                @endforeach

                                @else

                                    <li class="active"><a href="" data-toggle="tab">Product not available in this section</a></li>

                                @endif

                            </ul>
                        </div>
                        <div class="tab-content">


                            @if($categories->count() > 0)

                            @foreach($categories as $category)

                                <div class="tab-pane fade active in" id="{{ $category->id }}" >


                                    @php $x = 4 @endphp


                                    @foreach($category->products as $product)


                                        @if($x > 0)

                                            <div class="col-sm-3">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ url('storage/product/'.$product->image) }}" height="150px" width="100px" alt="" />
                                                            <h2>${{ $product->price }}</h2>
                                                            <p>{{ $product->title }}</p>
                                                            <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View details</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                        @php $x-- @endphp

                                    @endforeach


                                </div>

                            @endforeach


                            @else

                                <div class="tab-pane fade in active">


                                    <div class="col-sm-12">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">

                                                    <h4>Product not available</h4>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endif




                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">feature items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">


                                @php $active = 1 @endphp


                                @if($categories->count() > 0)

                                @foreach($categories as $category)

                                    <div class="item {{ $active == 1 ? 'active' : '' }}">

                                        @php $x = 4 @endphp
                                        @foreach($category->Fproducts as $product)
                                            @if($x > 0)



                                                <div class="col-sm-3">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="{{ url('storage/product/'.$product->image) }}" height="160px" width="80px" alt="" />
                                                                <h2>${{ $product->price }}</h2>
                                                                <p>{{ $product->title }}</p>
                                                                <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View details</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            @endif

                                            @php $x-- @endphp

                                        @endforeach


                                    </div>

                                    @php $active++ @endphp

                                @endforeach


                                @else

                                    <div class="item active">

                                    <div class="col-sm-12">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <h4>Products not available</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    </div>


                                @endif


                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>

            </div>
        </div>
    </section>

@endsection
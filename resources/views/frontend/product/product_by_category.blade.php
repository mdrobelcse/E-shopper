@extends('layouts.frontend.app')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('frontend.category_brand.index')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>


                        @if($products->count() > 0)

                        @foreach($products as $key=>$product)


                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ url('storage/product/'.$product->image) }}" height="150px" width="100px" alt="" />
                                            <h2>${{ $product->price }}</h2>
                                            <p>{{ $product->title }}</p>
                                            <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View product</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View product</a>
                                            </div>
                                        </div>
                                        <img src="images/home/new.png" class="new" alt="" />
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        @endforeach

                        @else

                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="choose">
                                        <h4 class="category_error">Products not available in this category</h4>
                                    </div>
                                </div>
                            </div>

                        @endif


                        <ul class="pagination">
                            {{ $products->links() }}
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>


@endsection
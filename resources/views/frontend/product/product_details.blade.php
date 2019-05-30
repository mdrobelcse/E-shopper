@extends('layouts.frontend.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('frontend.category_brand.index')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ url('storage/product/',$product->image) }}" alt="" />
                                <h3>ZOOM</h3>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{ $product->title }}</h2>
                                <p>Web ID: 1089772</p>
                                <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                                <span>
									<span>US ${{ $product->price }}</span>



                                    @guest

                                        <button onclick="toastr.info('To add your cart. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })" type="button" class="btn btn-fefault cart">
										   <i class="fa fa-shopping-cart"></i>
										      Add to cart
									    </button>

                                    @else

                                        <form id="addtocartproduct" action="{{ route('cart.store',$product->id) }}" method="post">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <label>Quantity:</label>
									        <input type="number" name="product_quantity" value="1" />

                                             <button type="submit" class="btn btn-fefault cart">
										        <i class="fa fa-shopping-cart"></i>
										           Add to cart
									         </button>

                                        </form>

                                    @endguest


								</span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> {{ $product->brand->name }} </p>
                                <p><b>Category:</b> {{ $product->category->name }} </p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                                <p>{{ $product->description }}</p>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->



                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recomanded items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">



                                @foreach($categories as $category)

                                    <div class="item {{ $category->slug == 'shoes' ? 'active' : '' }}">




                                        @php $x = 3; @endphp
                                        @foreach($category->Fproducts as $product)
                                            @if($x > 0)



                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="{{ url('storage/product/'.$product->image) }}" height="160px" width="60%" alt="" />
                                                                <h2>${{ $product->price }}</h2>
                                                                <p>{{ $product->title }}</p>
                                                                <a href="{{ route('product.details',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View details</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            @endif

                                            @php $x--; @endphp

                                        @endforeach


                                    </div>

                                @endforeach


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
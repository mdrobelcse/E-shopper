@extends('layouts.frontend.app')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">product name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>



                    @if($allproducts->count() > 0)

                        @foreach($allproducts as $product)

                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ url('storage/product/'.$product->product->image) }}" height="120px" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $product->product->title }}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>${{ $product->product->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">


                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product->product_quantity }}" autocomplete="off" size="2" readonly>


                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $total = $product->product->price*$product->product_quantity }}</p>
                                </td>

                            </tr>


                        @endforeach




                    @else


                        <td class="cart_product">
                            <h4>Item not available in your cart</h4>
                        </td>


                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->



@endsection
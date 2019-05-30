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
            <div class="table-responsive cart_info" id="showAllcartitem">
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




                    @php $totalprice = 0 @endphp


                    @if($cartitems->count() > 0)

                    @foreach($cartitems as $item)

                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ url('storage/product/'.$item->product->image) }}" height="120px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item->product->title }}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>${{ $item->product->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                   <a class="cart_quantity_up" href=""> + </a>
                                   <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                   <a class="cart_quantity_down" href=""> - </a>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $total = $item->product->price*$item->product_quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a data-id="{{ $item->id }}" id="deletecartitem" class="cart_quantity_delete" href="{{ url('delete/cart/item') }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>



                     @php


                         $totalprice = $totalprice+$total


                     @endphp


                    @endforeach




                    @else


                        <td class="cart_product">
                            <h4 class="category_error">Item not available in your cart</h4>
                        </td>


                     @endif


                    </tbody>

                </table>


            </div>

        </div>
    </section> <!--/#cart_items-->

    <div id="getallcartitem" data-url="{{ url('get/cart/item') }}"></div>

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{ $totalprice }}</span></li>
                            <li>Tax <span>$2%</span></li>

                            @php

                                   $tex = $totalprice*2/100;

                            @endphp

                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{ $tex+$totalprice }}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection

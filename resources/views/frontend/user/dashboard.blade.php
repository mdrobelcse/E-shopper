@extends('layouts.frontend.app')

@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Order ID</td>
                        <td class="description">Name</td>
                        <td class="price">Address</td>
                        <td class="quantity">Order Status</td>
                        <td class="quantity">Action</td>
                    </tr>
                    </thead>
                    <tbody>

                @if($allorder->count() > 0)

                @foreach($allorder as $order)

                    <tr>
                        <td class="cart_product">
                            <h4>#LE-{{ $order->id }}</h4>
                        </td>
                        <td class="cart_description">
                            <p>{{ $order->name }}</p>
                        </td>
                        <td class="cart_description">
                            <p>{{ $order->address }}</p>
                        </td>

                        <td class="cart_description">
                            @if($order->order_status==0)

                                <span class="badge badge-danger">Order pending</span>

                            @elseif($order->order_status==1)

                                <span class="badge badge-success">Order Confirmed</span>

                            @else

                                <span class="badge badge-info">Order Completed</span>


                            @endif
                        </td>

                        <td class="cart_description">
                            <a href="{{ route('user.product.view',$order->id) }}" class="btn btn-info">view</a>
                        </td>


                    </tr>


                    @endforeach

                    @else


                    <tr>
                        <td class="cart_product">
                            <p class="category_error">you have no any order yet</p>
                        </td>
                    </tr>


                    @endif



                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
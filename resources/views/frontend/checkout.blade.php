@extends('layouts.frontend.app')

@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->


            <div class="checkout-options">
                <h3>New User</h3>
                <p>Checkout options</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Register Account</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Guest Checkout</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">

                <div class="row">
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h2 class="title text-center">Get In Touch</h2>
                            <div class="status alert alert-success" style="display: none"></div>


                            <form id="order-form" class="contact-form row" name="contact-form" method="post" action="{{ route('order') }}">

                                @csrf

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Name">
                                    <span id="errorname"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Phone">
                                    <span id="errorphone"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="text" name="email" class="form-control" placeholder="E-mail">
                                    <span id="erroremail"></span>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="name">Shipping Address</label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Shipping Address">
                                    <span id="erroraddress"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Payment method</label>
                                    <select class="form-control" name="payment_method" id="payments">

                                        <option selected disabled value="0">Select One</option>
                                        <option value="cashin">Cash in</option>
                                        @foreach($payment_methods as $payment_method)

                                             <option value="{{ $payment_method->slug }}">{{ $payment_method->payment_name }}</option>

                                        @endforeach


                                    </select>
                                    <span id="errorpayments"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <div id="cashin" class="alert alert-info mt-2 text-center hidden">
                                        <h3>
                                            For Cash in there is nothing necessary. Just click Finish Order.
                                            <br>
                                            <small>
                                                You will get your product in two or three business days.
                                            </small>
                                        </h3>
                                    </div>
                                @php $x = 1 @endphp
                                @foreach($payment_methods as $payment_method)

                                    <div id="{{ $payment_method->slug }}" class="alert alert-{{ $x==1 ? 'danger' : 'warning' }} mt-2 text-center hidden">
                                        <h3>Payment Name: {{ $payment_method->payment_name }}</h3>
                                        <p>
                                            <span> No : {{ $payment_method->number }} </span>
                                            <br>
                                            <span>Account Type: {{ $payment_method->account_type }}</span>
                                        </p>
                                        <div class="alert alert-{{ $x==1 ? 'danger' : 'warning' }}">
                                            {{ $payment_method->description }}
                                        </div>
                                        <input type="text" id="transunction_id" name="transunction_id" class="form-control" placeholder="Transanction id">
                                    </div>

                                @php $x ++ @endphp

                                 @endforeach

                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                                    <span id="errormsg"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="finish order">
                                </div>
                            </form>



                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <h2 class="title text-center">Contact Info</h2>
                            <address>
                                <p>E-Shopper Inc.</p>
                                <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                                <p>Newyork USA</p>
                                <p>Mobile: +2346 17 38 93</p>
                                <p>Fax: 1-714-252-0026</p>
                                <p>Email: info@e-shopper.com</p>
                            </address>
                            <div class="social-networks">
                                <h2 class="title text-center">Social Networking</h2>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section> <!--/#cart_items-->


@endsection


@push('js')



    <script type="text/javascript">
        $(document).change(function(){

            var payments_method = $("#payments").val();

           // console.log(payments_method);

            if(payments_method == 'cashin'){

                $("#cashin").removeClass('hidden');
                $("#bkash").addClass('hidden');
                $("#rocket").addClass('hidden');

            }else if(payments_method == 'bkash'){

                $("#bkash").removeClass('hidden');
                $("#cashin").addClass('hidden');
                $("#rocket").addClass('hidden');

            }else if(payments_method == 'rocket'){

                $("#rocket").removeClass('hidden');
                $("#cashin").addClass('hidden');
                $("#bkash").addClass('hidden');
            }


        })
    </script>

@endpush

@extends('layouts.frontend.app')

@section('content')


    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row" style="margin-bottom: 60px;">
                <div class="col-sm-12">
                    <h2 class="title text-center">Contact Us</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29206.496084015573!2d90.39292478187441!3d23.789707712465113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f70deb73%3A0x30c36498f90fe23!2sGulshan%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1558777905008!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="{{ route('contact.sendmessage') }}" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                          @csrf
                            <div class="form-group col-md-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                <span id="errorname"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                <span id="erroremail"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                <span id="errorsub"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                                <span id="errormsg"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
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
    </div><!--/#contact-page-->

@endsection
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">


                    @php $active = 1 @endphp

                    @if($sliders->count() > 0)

                    @foreach($sliders as $key=>$slider)

                        <div class="item {{ $active == 1 ? 'active' : '' }}">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{ $slider->heading }}</h2>
                                <p>{{ $slider->description }}</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ url('storage/slider/'.$slider->image) }}" class="girl img-responsive" alt="" />
                                <img src="{{ asset('frontend/images/home/pricing.png') }}"  class="pricing" alt="" />
                            </div>
                        </div>

                    @php $active++ @endphp

                    @endforeach

                    @else


                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend/images/home/girl1.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('frontend/images/home/pricing.png') }}"  class="pricing" alt="" />
                                </div>
                            </div>

                    @endif



                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
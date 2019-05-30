<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

        @if($categories->count() > 0)

        @foreach($categories as $key=>$category)

           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 class="panel-title"><a href="{{ route('products.bycategory',$category->id) }}">{{ $category->name }}</a></h4>
               </div>
           </div>

        @endforeach

        @else


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="">Category not available</a></h4>
                </div>
            </div>

        @endif


    </div><!--/category-productsr-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">

                @if($brands->count() > 0)

                @foreach($brands as $key=>$brand)

                   <li><a href="{{ route('products.bybrand',$brand->id) }}"> <span class="pull-right">(50)</span>{{ $brand->name }}</a></li>

                @endforeach

                @else

                    <li><a href=""><span class="pull-right"></span>Brands not available</a></li>

                @endif


            </ul>
        </div>
    </div><!--/brands_products-->

    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
            <b>$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="{{ asset('frontend/images/home/shipping.jpg') }}" alt="" />
    </div><!--/shipping-->

</div>
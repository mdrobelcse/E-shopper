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
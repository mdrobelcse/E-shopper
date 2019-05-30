<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Paymentmethod;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cartitems = Cart::where('user_id',Auth::id())
                          ->where('order_id',0)->get();
        return view('frontend.cart.card',compact('cartitems'));
    }



    public function getCartitem(){
        $cartitems = Cart::where('user_id',Auth::id())
            ->where('order_id',0)->get();
        return view('frontend.cart.response',compact('cartitems'));
    }



    public function addtocard(Request $request, $id)
    {

        $availableitem = Cart::where('product_id',$id)
                              ->where('user_id',Auth::id())
                              ->where('order_id',0)
                              ->get();

        if($availableitem->count() > 0){

            return response()->json("error");

        }elseif($request->product_quantity < 0 ){

            Toastr::info('please enter a valid quantity:)','info');
            return redirect()->back();

        }else{

            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->product_quantity = $request->product_quantity;
            $cart->user_id = Auth::id();
            $insert = $cart->save();
            if($insert){
                return response()->json("success");
            }else{
                return response()->json("error");
            }
        }

    }



    public  function checkout(){

        $cartitems = Cart::where('user_id',Auth::id())
            ->where('order_id',0)->get();


        if($cartitems->count() > 0){

            $payment_methods = Paymentmethod::all();
            return view('frontend.checkout',compact('payment_methods'));

        }else{

            Toastr::info('Your cart is empty.please add product to your cart :)','Info');
            return redirect()->route('home');
        }

        return redirect()->back();

    }


    public function removeitem(Request $get){
        $id = $get->id;
        $delete = Cart::where("id", $id)->delete();
        if($delete){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }


}

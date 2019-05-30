<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function storeOrder(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:orders',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
            'message' => 'required',
        ]);



        $check_duplicate = Order::where('user_id',Auth::id())->where('order_status',0)->orWhere('order_status',1);


        if($check_duplicate->count() > 0){
            return response()->json("duplicate_order");
        }else{



            $order = new Order();
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;

            if($request->payment_method == 'bkash'){

                $order->payment_id = 1;

            }elseif($request->payment_method == 'rocket'){

                $order->payment_id = 2;

            }else{

                $order->payment_id = null;
            }

            $order->transanction_id = $request->transanction_id;
            $order->message = $request->message;
            $order->user_id = Auth::id();
            $order->save();

            $cart = Cart::where('user_id', Auth::id())
                          ->where('order_status',0)
                ->update(['order_id' => $order->id]);

            if($cart){
                return response()->json("success");
            }else{
                return response()->json("error");
            }

        }



    }



}//end class

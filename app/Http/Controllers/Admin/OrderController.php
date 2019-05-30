<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Notifications\OrderConfirmation;
use App\Order;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

    public function viewOrder($id)
    {

       $order = Order::find($id);
       $userid = $order->user_id;
       $allproducts = Cart::where('user_id',$userid)
                            ->where('order_id',$id)
                            ->get();
       return view('admin.order.view',compact('order','allproducts'));

    }


    public function OrderApproval($id)
    {

       $order = Order::find($id);

        $user_id = $order->user_id;
        $order->order_status=1;
        $order->save();


        $cart = Cart::where('order_id',$id)
                     ->where('user_id',$user_id)
                     ->update(['order_status' => 1]);

        $users = User::where('id',$user_id)->get();
        Notification::send($users, new OrderConfirmation());

        Toastr::success('Order Successfully Approved :)','Success');
        return redirect()->back();
    }


    public function orderComplete($id)
    {

            $order = Order::find($id);
            $user_id = $order->user_id;
            $order->order_status=2;
            $order->save();


        $cart = Cart::where('order_id',$id)
            ->where('user_id',$user_id)
            ->update(['order_status' => 1]);



        Toastr::success('Order Successfully Completed :)','Success');
            return redirect()->back();
    }


    public function OrderDelete($id)
    {
        $order = Order::find($id);
        $cart = Cart::where('order_id',$id)->delete();
        $order->delete();

        Toastr::success('Order Successfully deleted :)','Success');
        return redirect()->back();

    }


}//end class

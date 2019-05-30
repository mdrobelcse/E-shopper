<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();
        $allorder = Order::where('user_id',$user_id)->get();
        return view('frontend.user.dashboard',compact('allorder'));
    }

    public function viewProduct($id)
    {

        $order = Order::find($id);
        $userid = $order->user_id;
        $allproducts = Cart::where('user_id',$userid)
            ->where('order_id',$id)
            ->get();
        return view('frontend.user.view_product',compact('allproducts'));

    }




}//end class

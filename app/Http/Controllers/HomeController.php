<?php

namespace App\Http\Controllers;

use App\Category;
use App\District;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $products = Product::latest()->get()->take(12);
        $categories = Category::latest()->groupitem()->get();
        return view('frontend.welcome',compact('products','categories'));
    }

    public function getDistrict($id)
    {
        $districts = District::where('div_id',$id)->get();
        return json_encode($districts);
    }



}//end class

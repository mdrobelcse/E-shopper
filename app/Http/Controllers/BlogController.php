<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {

        return view('frontend.blog.index');
    }

    public function blogSingle()
    {

        return view('frontend.blog.single');
    }


}//end class

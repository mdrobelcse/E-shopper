<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
       // return view('frontend.user.profile');
        echo "profile";
    }
}

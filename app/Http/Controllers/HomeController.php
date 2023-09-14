<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
            $userRole = Auth::user()->role;
            $userImg = Auth::user()->img;
            $userSign = Auth::user()->sign;
            
            Session::put('USERNAME', $userName);
            Session::put('USERROLE', $userRole);
            Session::put('USERIMG', $userImg);
            Session::put('USERSIGN', $userSign);
        }

        return view('admin.dashboard.home');
    }
}

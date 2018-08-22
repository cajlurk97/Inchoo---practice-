<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {

        $user = array("logedin" => false, "name" => "luka");
        return view('home', compact('user'));
    }

    /*
    public function about()
    {
        return view('about', compact($user));
    }

    public function contact()
    {
        return view('contact', compact($user));;
    }
    */
}

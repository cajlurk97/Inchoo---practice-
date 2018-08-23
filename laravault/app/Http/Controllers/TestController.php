<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('home', ['logedin' => 'true']);
    }

    public function about()
    {
        return view('about', ['logedin' => 'true']);
    }

    public function contact()
    {
        return view('contact', ['logedin' => 'true']);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyLaravaultController extends Controller
{
    public function index(){
        return view("mylaravault.home");
    }

    public function fileUpload(){
        return view("mylaravault.forms.fileUpload");
    }
    public function folderUpload(){
        return view("mylaravault.forms.folderUpload");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MyLaravaultController extends Controller
{
    public static function index()
    {
        //$id=\Auth::user()->get('id');
        //$content=DB::table('files')->where('ownerid', '=', '$id')-get();
        $files=DB::table('files')->get();
        //var_dump($files);
        return view("mylaravault.home", compact('files'));
    }

    public function showFileUploadForm()
    {
        return view("mylaravault.forms.fileUpload");
    }

    public function showfolderUploadForm()
    {
        return view("mylaravault.forms.folderUpload");
    }

}

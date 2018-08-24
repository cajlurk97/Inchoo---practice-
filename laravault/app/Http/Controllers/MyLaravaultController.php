<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class MyLaravaultController extends Controller
{
    public static function index()
    {
        $id = \Auth::user()->id;
        $files = DB::table('files')->where('ownerid', '=', $id)->get();
        //DB::..->get returning object, in next line object is converted in array
        $files = json_decode(json_encode($files), true);

        $page = self::showFiles($files);
        return $page;

    }

    public static function publicIndex()
    {
        $id = \Auth::user()->id;
        $files = DB::table('files')->where('ownerid', '=', $id)->orWhere('public', '=', 1)->get();
        $files = json_decode(json_encode($files), true);

        $page = self::showFiles($files);
        return $page;
    }

    public function showFileUploadForm()
    {
        return view("mylaravault.forms.fileUpload");
    }

    public function showfolderUploadForm()
    {
        return view("mylaravault.forms.folderUpload");
    }

    public static function showFiles($files)
    {
        foreach ($files as $key => $file) {
            $owner = DB::table('users')->where('id', '=', $file['ownerid'])->first();
            $owner = json_decode(json_encode($owner), true);
            $files[$key]['ownerfullname'] = $owner['name'] . ' ' . $owner['surname'];
        }

        return view("mylaravault.home", compact('files'));
    }

}

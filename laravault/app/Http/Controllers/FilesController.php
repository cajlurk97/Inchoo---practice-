<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class FilesController extends Controller
{
    public function Upload()
    {
        $path = dirname(__DIR__, 3) . "/uploads/";


        $privacy = $_POST["privacy"];
        if (isset($_FILES['file'])) {

            $file_tmp = $_FILES['file']['tmp_name'];

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $time = date('d_m_Y_H_i_s');

            if ($_FILES['file']['error'] == 0) {
                move_uploaded_file($file_tmp, $path . $file_name . $time . '.' . $ext);
                $ownerid = \Auth::user()->id;
                try {
                    DB::table('files')
                        ->insert([
                            'ownerid' => $ownerid,
                            'name' => $file_name,
                            'public' => $privacy,
                            'path' => $path . $file_name . $time . '.' . $ext,
                            'ext' => $ext,
                            'size' =>$_FILES['file']['size']
                        ]);
                } catch (\PDOException $exception) {
                    echo "Failed to insert file in DB, error:" . $exception;
                }
            } else {
                echo "Failed to read file";
            }
        }

        return MyLaravaultController::index();

    }

    public function Download()
    {
        $fileid = $_GET["fileid"];
        $file = DB::table('files')->where('id', '=', $fileid)->get();
        $file = json_decode(json_encode($file[0]), true);

        $path = dirname(__DIR__, 3) . "/uploads/";
        $filename = $file['name'];

        if (!empty($filename) && file_exists($path)) {
            //Check does active user have permission on file

            if (!$this->isAccessible($fileid)) {
                echo 'You have no permission for that file';
            } else {
                // Define headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename='$filename'");
                header("Content-Transfer-Encoding: binary");
                readfile($path);
                DB::table('files')->where('id', '=', $fileid)->increment('downloadcount');

            }

        } else {
            echo 'The file you want here does not exist.';
        }

        return MyLaravaultController::index();

    }

    public function showEditForm()
    {
        if ($this->isAccessible($_GET['fileid'])) {
            $file = DB::table('files')->where('id', '=', $_GET['fileid'])->get();
            $file = json_decode(json_encode($file[0]), true);
            return view("mylaravault.forms.edit", compact('file'));
        }
        echo "You do not have permission on this file";
    }

    public function isAccessible($fileid)
    {
        $file = DB::table('files')->where('id', '=', $fileid)->get();
        $file = json_decode(json_encode($file[0]), true);
        $ownerid = $file['ownerid'];
        $privacy = $file['public'];

        if ($ownerid != \Auth::user()->id && $privacy == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function delteFile()
    {
        DB::table("files")
            ->where('id', '=', $_GET['fileid'])
            ->delete();
        return MyLaravaultController::index();
    }

    public function editFile(){

        if(isset($_POST['filename'])){
            DB::table("files")
                ->where('id', '=', $_GET['fileid'])
                ->update(['public' => $_POST['privacy']]);
        }
        if(isset($_POST['privacy'])){
            DB::table("files")
                ->where('id', '=', $_GET['fileid'])
                ->update(['name' => $_POST['filename'] ]);
        }
        var_dump( date("Y_m_d H:i:s"));
        DB::table("files")
            ->where('id', '=', $_GET['fileid'])
            ->update(['updated_at' => date("Y_m_d H:i:s") ]);
        return MyLaravaultController::index();
    }

}

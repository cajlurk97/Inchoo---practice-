<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FilesController extends Controller
{
    public function Upload()
    {
        $path = dirname(__DIR__, 3) . "/uploads/";


        $privacy = $_POST["privacy"];
        if (isset($_FILES['file'])) {

            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];

            if ($_FILES['file']['error'] == 0) {
                $status = move_uploaded_file($file_tmp, $path . $file_name);
                $ownerid = \Auth::user()->id;
                try {
                    DB::table('files')->insert(
                        ['ownerid' => $ownerid,
                            'name' => $file_name,
                            'public' => $privacy,
                            'path' => $path
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
        $file=DB::table('files')->where('id', '=', $fileid)->get();

        var_dump($file);
        /*
        $path = dirname(__DIR__, 3) . "/uploads/";
        $ownerid=$file[0]['ownerid'];
        $privacy=$file[0]['public'];

        if (!empty($filename) && file_exists($path . $file[0]['name'])) {
            //Check does active user have permission on file
            if ($ownerid != \Auth::user()->get('id') && $privacy == 0) {
                echo 'You have no permission for that file';
            }else{
                // Define headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename='$file[0]['name']'");
                header("Content-Transfer-Encoding: binary");
                readfile($path. $file[0]['name']);                     //for reading the file
                //Models\Dir::incrementDownloadCount($filename);
                exit;
            }

        } else {
            echo 'The file you want here does not exist.';
        }
        */
    }


}

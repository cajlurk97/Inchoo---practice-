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

}

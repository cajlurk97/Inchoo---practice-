<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 2:56 PM
 */

namespace App\Controllers;


use Core\Model;
use Core\View;
use App\Models;

class Dir extends \Core\Controller
{

    public function indexAction()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            $files = Models\Dir::getMyFiles($_SESSION['username']);
            $acc = Models\Dir::getAcc($_SESSION['username']);

            View::renderTemplate("Dir/home.html", ['username' => $_SESSION['username'], 'files' => $files, 'acc' => $acc, 'filesCount' => count($files)]);
        } else {
            View::renderTemplate("Login/loginForm.html");
        }
    }

    /**
     *
     */
    public function accAction()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            $acc = Models\Dir::getAcc($_SESSION['username']);
            View::renderTemplate("Dir/home.html", ["name" => $acc[0]['name'], "id" => $acc[0]['id'], "email" => $acc[0]['email']]);
        } else {
            View::renderTemplate("Login/loginForm.html");
        }
    }

    public function newFileAction()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            View::renderTemplate("Dir/uploadForm.html");
        } else {
            View::renderTemplate("Login/loginForm.html");
        }
    }

    public function uploadAction()
    {
        session_start();
        $privacy = $_POST["privacy"];
        if (isset($_FILES['file'])) {

            $errors = array();

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            $file_tmp = $_FILES['file']['tmp_name'];

            $path = dirname(__DIR__, 1) . '/Uploads/' . $file_name . '.' . $ext;
   ;

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $path);
                Models\Dir::insertFile($_SESSION['username'], $path, $file_name, $privacy);
                echo "Success";
                session_abort();
                $this->indexAction();
            } else {
                echo "fail";
                print_r($errors);
            }

        }

    }

    public function downloadAction()
    {
        $filename = $_GET["filename"];
        $dbfile = Models\Dir::getFile($filename);

        $privacy = $dbfile[0]['privacy'];
        $ownerid = $dbfile[0]['ownerid'];
        $Path_of_file = $dbfile[0]['path'];
        $ext=pathinfo($Path_of_file, PATHINFO_EXTENSION);
        var_dump($Path_of_file);
        if (!empty($filename) && file_exists($Path_of_file)) {

            //Check does active user have permission on file
            if ($ownerid != Models\Login::getActiveUserId() && $privacy == 0) {
                echo 'You have no permission for that file';
            }else{
                // Define headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename='$filename . $ext'");
                header("Content-Transfer-Encoding: binary");
                readfile($Path_of_file);                     //for reading the file
                Models\Dir::incrementDownloadCount($filename);
                exit;
            }

        } else {
            echo 'The file you want here does not exist.';
        }


    }
}
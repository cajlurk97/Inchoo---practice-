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

            View::renderTemplate("Dir/home.html", ['files' => $files]);
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
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $path = __DIR__ . "/uploads/" . $file_name;
            var_dump($path);
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $path);
                Models\Dir::insertFile($_SESSION['username'], $path, $file_name);
                echo "Success";


            } else {
                echo "fail";
                print_r($errors);
            }
        }
    }


}
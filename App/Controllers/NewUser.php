<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 12:52 PM
 */

namespace App\Controllers;


use Core\Controller;
use Core\Model;
use Core\View;
use  App\Models;
class NewUser extends Controller
{
    public function indexAction(){
        View::renderTemplate("/NewUser/form.html");
    }

    public function createAction(){


        $username=$_POST['username'];
        $password=$_POST['password'];
        $name=$_POST['name'];
        $email=$_POST['email'];

        Models\NewUser::insertUser($username, $password, $name, $email);

        echo "Congrats, you made acc";
        View::renderTemplate("/Login/loginForm.html");
    }





}
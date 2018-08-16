<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 8:39 AM
 */

namespace App\Controllers;


use Core\View;
use App\Models;

class Login extends \Core\Controller
{
    public function indexAction(){
        View::renderTemplate('Login/logIn.html');
    }



    public function loginAction(){
     $user=Models\Login::isUserExist($_POST['username']);
        var_dump($user);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 12:52 PM
 */

namespace App\Controllers;


use Core\Controller;
use Core\View;
use  App\Models;

class NewUser extends Controller
{
    public function indexAction()
    {
        View::renderTemplate("/NewUser/form.html");
    }

    public function createAction()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        Models\NewUser::insertUser($username, $password, $name, $email);

        $id = Models\NewUser::getUserId($username);
        echo "You get an email, go activate your acc";
        //E-MAIL
        {
            $actual_link = "http://$_SERVER[HTTP_HOST]/" . "NewUser/activate?id=" . $id;


            $toEmail = $email;
            $subject = "User Registration Activation Email";
            $content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
            $mailHeaders = "From: Admin\r\n";

            /*
            if(mail($toEmail, $subject, $content, $mailHeaders)) {
                $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
            }
            */
            echo $content;
        }
        View::renderTemplate("/Login/loginForm.html");
    }

    public function activateAction()
    {
        Models\NewUser::setUserActiveId($_GET['id']);
        echo "You acc now is activated";
        View::renderTemplate("/Login/loginForm.html");
    }

    public function index2Action()
    {
             View::renderTemplate("/Login/loginForm.html");
    }
}
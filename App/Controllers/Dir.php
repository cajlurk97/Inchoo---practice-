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
        View::renderTemplate("Dir/home.html");
    }

    public function accAction(){
            session_start();
            $acc = Models\Dir::getAcc($_SESSION('username') );
            View::renderTemplate("Dir/home.html",[
            "name" => $acc['name'],
            "id" => $acc['id'],
            "email" => $acc['email']
        ]);
    }


}
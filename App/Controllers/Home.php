<?php

namespace App\Controllers;

use \Core\View;



/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        session_start();
        if(isset($_SESSION['username'])){
            View::renderTemplate('Home/index.html', [
                "name"=> $_SESSION['username']
            ]);
        }
        else{
            View::renderTemplate('Login/loginForm.html');
        }
    }

    public function aboutAction()
    {

        View::renderTemplate('Home/about.html');
    }

    public function contactAction()
    {
        View::renderTemplate('Home/contact.html');
    }

}

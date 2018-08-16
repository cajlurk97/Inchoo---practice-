<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 12:53 PM
 */

namespace App\Models;

use PDO;

class NewUser extends \Core\Model
{
    public static function insertUser($username, $password, $name, $email){
        try{

            $db=static::getDB();
            $db->query(" INSERT INTO users (username, password, name, email) VALUES ( '$username', '$password', '$name', '$email') ");


        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
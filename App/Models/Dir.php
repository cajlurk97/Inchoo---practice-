<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 3:05 PM
 */

namespace App\Models;



use PDO;

class Dir extends \Core\Model
{
    public static function getAcc($username){
        try {
            $db = static::getDB();
            $results = $db->query("SELECT 'id', 'name', 'username', 'password' FROM users WHERE username='$username' ");
            return $results;
        }catch(DOException $e){

        }

    }
}
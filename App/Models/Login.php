<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 9:29 AM
 */

namespace App\Models;

use PDO;



class Login extends \Core\Model
{
    public static function userExist($username){
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id, username, password, name FROM users WHERE username='$username' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if( !empty($results) && !strcmp( $results[0]['username'], $username)){
                return true;
            }
            else{
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getUserPassword($username)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT username, password FROM users WHERE username='$username' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['password'];

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}
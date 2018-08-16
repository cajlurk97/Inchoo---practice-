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
    public static function isUserExist($username){

        try {
            $db = static::getDB();

            $stmt = $db->query("SELECT id, username, password, created_at FROM users WHERE username='$username' ");
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
}
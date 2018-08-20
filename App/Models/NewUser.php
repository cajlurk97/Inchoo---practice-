<?php
/**
 * Created by PhpStorm.
 * User: inchoo
 * Date: 8/16/18
 * Time: 12:53 PM
 */

namespace App\Models;

use \Core\Model;

use PDO;

class NewUser extends Model
{
    public static function insertUser($username, $password, $name, $email)
    {
        try {

            $db = static::getDB();
            $hashpasword = password_hash($password, PASSWORD_DEFAULT);
            $db->query(" INSERT INTO users (username, password, name, email) VALUES ( '$username', '$hashpasword', '$name', '$email') ");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getUserId($username)
    {
        try {

            $db = static::getDB();
            $stmt = $db->query(" SELECT id FROM users WHERE username='$username' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['id'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function setUserActiveId($id)
    {
        try {

            $db = static::getDB();
            $db->query(" UPDATE users SET isActiv = 1 WHERE id = '$id'");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
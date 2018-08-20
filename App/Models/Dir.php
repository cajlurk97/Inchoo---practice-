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
            $stmt = $db->query("SELECT id, name, username, email FROM users WHERE username='$username' ");

            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(DOException $e){

        }
        return 0;
    }

    public static function insertFile($username, $path, $filename){
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id FROM users WHERE username='$username' ");
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $ownerid=$results[0]['id'];

            $db->query("INSERT INTO  files (name, ownerid, path) VALUES('$filename', '$ownerid', '$path')");

        }catch(DOException $e){

        }

    }
    public static function getMyFiles($username){
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id FROM users WHERE username='$username' ");
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $ownerid=$results[0]['id'];
            $db = static::getDB();
            $stmt = $db->query("SELECT name, path FROM files WHERE ownerid='$ownerid' ");
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch(DOException $e){

        }
        return $results;
    }


}
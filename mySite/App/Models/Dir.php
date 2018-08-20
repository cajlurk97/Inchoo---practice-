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
    public static function getAcc($username)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id, name, username, email FROM users WHERE username='$username' ");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results[0];
        } catch (DOException $e) {

        }
        return 0;
    }

    public static function insertFile($username, $path, $filename, $privacy)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id FROM users WHERE username='$username' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ownerid = $results[0]['id'];

            $db->query("INSERT INTO  files (name, ownerid, path, privacy) VALUES('$filename', '$ownerid', '$path', '$privacy')");

        } catch (DOException $e) {

        }

    }

    public static function getMyFiles($username)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id FROM users WHERE username='$username' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ownerid = $results[0]['id'];
            $db = static::getDB();
            $stmt = $db->query("SELECT name, path, privacy, downloadCount FROM files WHERE ownerid='$ownerid' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (DOException $e) {

        }
        return $results;
    }

    public static function getFile($filename)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM files WHERE name='$filename'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $results[0];
            return $results;

        } catch (DOException $e) {

        }
    }
    public static function incrementDownloadCount($filename){
        try {

            $db = static::getDB();
            $db->query(" UPDATE files SET downloadCount = downloadCount + 1 WHERE name = '$filename'");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
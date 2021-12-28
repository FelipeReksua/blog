<?php

namespace model;

class Db
{
    private static $dbname = 'blog';
    private static $dbhost = 'localhost';
    private static $dbuser = '';
    private static $dbpass = '';
    
    private static $conn = null;


    public static function mysqliconnect()
    {
        mysqli_connect(self::$dbhost, self::$dbuser, self::$dbpass, self::$dbname);
    }
    
    public static function connect()
    {
        if (null == self::$conn) {
            try {
                self::$conn = new \PDO("mysql:host=" . self::$dbhost . ";" . "dbname=" . self::$dbname, self::$dbuser, self::$dbpass);
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$conn;
    }
    
    public static function disconnect()
    {
        self::$conn = null;
    }

    public static function query($sql = null, $params = [])
    {
        if (!$sql) {
            return null;
        }
        
        $pdo = Db::connect();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sth = $pdo->prepare($sql);
        $sth->execute($params);

        Db::disconnect();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
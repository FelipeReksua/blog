<?php

namespace controller;

class Db
{
    private static $dbname = 'blog';
    private static $dbhost = 'localhost';
    private static $dbuser = 'reksua';
    private static $dbpass = 'Proxys2020@!';
    
    private static $conn = null;

    
    // public function __construct() 
    // {
    //     die('Init function error.');
    // }

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
}
<?php

namespace controller;

require 'controller/db.php';
use controller\Db as Db;

class Front
{
    public static function getUser()
    {
        session_start();

    	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    		$user['id'] = $_SESSION["user_id"];
    		$user['name'] = $_SESSION["user_name"];
    		$user['email'] = $_SESSION["user_email"];
    		return $user;
		}
    	return null;
    }
    
    public static function home()
    {
        $sql = "SELECT * FROM post LIMIT 10";
        // $db = new Db();
    	$pdo = Db::connect();
        // $pdo = $db->connect();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sth = $pdo->prepare($sql);
        $sth->execute();

        $posts = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $user = Front::getUser();

        Db::disconnect();

        require 'view/index.php';
    }

    public static function myAccount()
    {
        $user = Front::getUser();
        require 'view/my-account.php';
    }
}
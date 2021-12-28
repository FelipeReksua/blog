<?php

namespace controller;

require 'model/db.php';
use model\Db as Db;

class Front
{
    public static function getUser()
    {
        session_start();

    	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    	   return null;
		}

        $email = $_SESSION["user_email"];
		$sql = "SELECT * FROM customer WHERE email = ?";

        $user = Db::query($sql, [$email]);

		return $user ? $user[0] : null;
    }
    
    public static function home()
    {
        $sql = "SELECT * FROM post LIMIT 10";

        $posts = Db::query($sql, []);
        $user = Front::getUser();

        require 'view/index.php';
    }

    public static function myAccount()
    {
        $user = Front::getUser();
        require 'view/my-account.php';
    }

    public static function createPost()
    {
        $user = Front::getUser();
        require 'view/create-post.html';
    }
}
<?php

namespace controller;

use model\Db as Db;

class Login
{
    public function doLogin()
    {
        // Initialize the session
        session_start();
         
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: /");
            exit;
        }

        // Define variables and initialize with empty values
        $email = "";
        $password = "";
        $emailError = "";
        $passwordError = "";
        $loginError = "";
         
        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         
            // Check if email is empty
            if(empty(trim($_POST["email"]))){
                $emailError = "Please enter email.";
            } else{
                $email = trim($_POST["email"]);
            }
            
            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $passwordError = "Please enter your password.";
            } else{
                $password = trim($_POST["password"]);
            }

            // Validate credentials
            if(empty($emailError) && empty($passwordError)){
                try {
                    $pdo = Db::connect();
                    $sql = "SELECT id, name, email, password FROM customer WHERE email = ?";
                    $sth = $pdo->prepare($sql);
                    $sth->execute([$email]);

                    $user = $sth->fetch();
                    Db::disconnect();


                    if (password_verify($password, $user['password'])) {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["user_id"]= $user["id"];
                        $_SESSION["user_name"] = stripslashes($user["name"]);
                        $_SESSION["user_email"] = $user["email"];
                    }

                    $loginError = "Login ou senha incorretos";
                    header("Location: /");
                } catch (Exception $e) {
                    die("Db error");
                }
            }
            $loginError = "Algo deu errado.";
            header("Location: /login");
        }
    }
}

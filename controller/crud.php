<?php

namespace controller;

use controller\Db as Db;

class Crud
{
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nameError = null;
            $emailError = null;
            $passError = null;
            $password = null;
            $validation = false;

            if (!empty($_POST)) {
                $validation = true;
                $id = $_POST['id'];
                if (!empty($_POST['name'])) {
                    $name = $_POST['name'];
                } else {
                    $nameError = 'Por favor, digite seu nome!';
                    $validation = false;
                }

                if (!empty($_POST['password'])) {
                    if (strlen($_POST['password']) < 6) {
                        $passError = 'A senha deve conter no mínimo 6 caracteres';
                        $validation = false;
                    }
                    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);
                }
            }


            if ($validation) {
                $pdo = Db::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE customer SET name = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name, $id));

                if ($password) {
                    $sql = "UPDATE customer SET password = ? WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($password, $id));
                }

                Db::disconnect();
                header("Location: /login");
            }
        }
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nameError = null;
            $emailError = null;
            $passError = null;
            $validation = false;

            if (!empty($_POST)) {
                $validation = true;
                if (!empty($_POST['name'])) {
                    $name = $_POST['name'];
                } else {
                    $nameError = 'Por favor, digite seu nome!';
                    $validation = false;
                }

                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailError = 'Por favor, digite um endereço de email válido!';
                        $validation = false;
                    }
                }

                if (!empty($_POST['password'])) {
                    if (strlen($_POST['password']) < 6) {
                        $passError = 'A senha deve conter no mínimo 6 caracteres';
                        $validation = false;
                    }
                    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);
                }
            }

            if ($validation) {
                $pdo = Db::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO customer (name, email, password) VALUES(?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($name, $email, $password));
                Db::disconnect();
                header("Location: /login");
            }
        }
    }
}
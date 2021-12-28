<?php

require 'controller/front.php';
require 'controller/crud.php';
require 'controller/login.php';
use controller\Crud as Crud;
use controller\Front as Front;
use controller\Login as Login;

class Router
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);

        if ($route === '') {
            return Front::home();
        }
        if ($route === 'login') {
            return require __DIR__ . '/view/login.html';
        }
        if ($route === 'criar-conta') {
            return require __DIR__ . '/view/create-account.html';
        }
        if ($route === 'minha-conta') {
            return Front::myAccount();
        }
        if ($route === 'criar-post') {
            return Front::createPost();
        }

        // POST ROUTES
        if ($route === 'create') {
            return require __DIR__ . '/controller/create.php';
        }
        if ($route === 'doLogin') {
            $login = new Login();
            return $login->doLogin();
        }
        if ($route === 'update') {
            $crud = new Crud();
            return $crud->update();
        }
        return require __DIR__ . '/view/404.html';
    }
}
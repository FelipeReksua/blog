<?php

require 'controller/front.php';
require 'controller/crud.php';
use controller\Crud as Crud;
use controller\Front as Front;

class Router
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);

        if ($route === '') {
            $front = new Front();
            return $front->home();
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

        // POST ROUTES
        if ($route === 'create') {
            return require __DIR__ . '/controller/create.php';
        }
        if ($route === 'doLogin') {
            return require __DIR__ . '/controller/login.php';
        }
        if ($route === 'update') {
            $crud = new Crud();
            $crud->update();
        }
        return require __DIR__ . '/view/404.html';
    }
}
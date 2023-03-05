<?php

namespace Controllers;
use MVC\Router;
use Model\Cartela;


class IndexController {

    public static function index(Router $router){

        $cartelas = Cartela::all();
       /*  debuguear($cartelas); */

        
        $router->render('/index/index', [
        'titulo' => 'pzr',
        'cartelas' => $cartelas
        ]);
    }

}
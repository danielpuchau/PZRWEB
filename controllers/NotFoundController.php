<?php

namespace Controllers;
use MVC\Router;

class NotFoundController{
    
    public static function error(Router $router){

        $router->render('index/error', [
            'titulo' => 'Página no Encontrada'
                    
        ]);
    }
}
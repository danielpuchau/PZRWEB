<?php

namespace Controllers;
use MVC\Router;
use Model\Radio;

class ApiRadio{
    
    public static function index(Router $router){

        
        $programas = Radio::all();

         


        $router->render('/radio/radio', [
            'titulo' => 'Radio',
            'programas' => $programas
        ]);
    }
}
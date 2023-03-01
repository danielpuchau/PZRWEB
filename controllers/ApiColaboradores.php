<?php

namespace Controllers;
use MVC\Router;
use Model\Colaborador;

class ApiColaboradores{
    
    public static function index(){

        
        $colaboradores = Colaborador::all();

        /* debuguear($programas); */


        $respuesta = [
            'colaboradores' => $colaboradores
        ];
       /*  debuguear($tareas); */
        echo json_encode($respuesta); 
        return;

    }
}
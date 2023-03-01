<?php

namespace Controllers;
use MVC\Router;
use Model\Artista;
use Model\Release;

class ApiArtistas{
    
    public static function index(){
        
        $artistas = Artista::all();

        $releasesArtistas = Release::all();

        $respuesta = [
            'artistas' => $artistas,
            'releasesArtistas' => $releasesArtistas
            
        ];
       /*  debuguear($tareas); */
        echo json_encode($respuesta); 
        return;

    }
}
<?php

namespace Controllers;
use MVC\Router;
use Model\Artista;
use Model\Release;

class ApiHome{
    
    public static function index(){
        $columna2 = "nombre";
        $columna1 = "id";
        $artistas = Artista::getDosColumna($columna1, $columna2);


        $limite = 11;
        $releases = Release::get($limite);


        foreach($releases as $release){
            $columna = "nombre";
            $artista = Artista::findCol($release->artista_id, $columna);
            $release->artista_id = $artista->nombre;
        }

        $respuesta = [
            'releases' => $releases,
        ];
        
        echo json_encode($respuesta); 
        return;

    }
}
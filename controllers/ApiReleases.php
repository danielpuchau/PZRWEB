<?php

namespace Controllers;
use MVC\Router;
use Model\Release;
use Model\Artista;
use Model\Tipo;

class ApiReleases{
    
    public static function index(){

        $columna2 = "nombre";
        $columna1 = "id";
        $artistas = Artista::getDosColumna($columna1, $columna2);
        
        $releases = Release::all();

        foreach($releases as $release){
            $columna = "nombre";

            $artista = Artista::findCol($release->artista_id, $columna);
            $release->artista_id = $artista->nombre;

            $tipo = Tipo::findCol($release->tipo_id, $columna);
            $release->tipo_id = $tipo->nombre;
        }


        $respuesta = [
            'releases' => $releases
        ];
       /*  debuguear($tareas); */
        echo json_encode($respuesta); 
        return;

    }
}
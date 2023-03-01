<?php

namespace Controllers;
use MVC\Router;
use Model\Release;
use Model\Artista;
use Model\Track;

class ApiSingleRelease{
    
    public static function index(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        

        $id = $_POST['id'];
  

        $singleRelease = Release::find($id);

        $nombre = "nombre";

        $nombreArtista = Artista::findCol($singleRelease->artista_id, $nombre);


        $columna = "release_id"; 
        $temasRelease = Track::whereAll($columna, $id); 



        if($singleRelease->creditos === null){
            $singleRelease->creditos = '';
        }

        

        $respuesta = [
            'singleRelease' => $singleRelease,
            'nombreArtista' => $nombreArtista,
            'temasRelease' => $temasRelease 
        ];

        echo json_encode($respuesta); 
        
        return;
    }

    }
}
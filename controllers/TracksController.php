<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Track;
use Model\Artista;
use Model\Release;
use MVC\Router;

class TracksController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        


        //añadimos la paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/tracks?page=1');
        }

        $registros_por_pagina = 20;
        $total = Track::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/tracks?page=1');
        }

        $tracks = Track::paginar($registros_por_pagina, $paginacion->offset());

        foreach($tracks as $track) {
            $track->artista = Artista::find($track->artista_id);
            $track->release = Release::find($track->release_id);
        }

        
        $router->render('admin/tracks/index', [
            'titulo' => 'Tracks',
            'tracks' => $tracks,
            'paginacion' => $paginacion->paginacion()
        ]);

    }


    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];

        
        $artistas = Artista::all();
        $releases = Release::all();

        $track = new Track;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }

            //el objeto toma los valores de post
            $track->sincronizar($_POST);

            //validar
            $alertas = $track->validar();

             // Guardar el registro
             if(empty($alertas)) {

                // Guardar en la BD
                $resultado = $track->guardar(); 

                if($resultado) {
                    header('Location: /admin/tracks');
                }
            }
        }
        $router->render('admin/tracks/crear', [
            'titulo' => 'Crear tracks',
            'alertas' => $alertas,
            'track' => $track,
            'artistas' => $artistas,
            'releases' => $releases

        ]);
    }



    
    public static function editar(Router $router) {

        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/tracks');
        }

        $artistas = Artista::all();
        $releases = Release::all();

        $track = Track::find($id);

        if(!$track) {
            header('Location: /admin/tracks');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
              

            $track->sincronizar($_POST);

            $alertas = $track->validar();

            if(empty($alertas)) {
            
                $resultado = $track->guardar();

                if($resultado) {
                    header('Location: /admin/tracks');
                }
            }
        }

        $router->render('admin/tracks/editar', [
            'titulo' => 'Actualizar track',
            'alertas' => $alertas,
            'track' => $track,
            'artistas' => $artistas,
            'releases' => $releases
        ]);
    }



    public static function eliminar() {

        if(!is_admin()) {
            header('Location: /login');
        }
        
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            
            
            $id = $_POST['id'];
            $track = Track::find($id);
            if(!isset($track) ) {
                header('Location: /admin/tracks');
            }
            $resultado = $track->eliminar();
            if($resultado) {
                header('Location: /admin/tracks');
            }
        }

    }
}
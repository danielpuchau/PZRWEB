<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Artista;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ArtistasController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        //añadimos la paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/artistas?page=1');
        }
        $registros_por_pagina = 5;
        $total = Artista::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/artistas?page=1');
        }

        $artistas = Artista::paginar($registros_por_pagina, $paginacion->offset());

        

      /*   $artistas = Artista::all(); */

         /* debuguear(is_admin());  */

        $router->render('admin/artistas/index', [
            'titulo' => 'Artistas',
            'artistas' => $artistas,
            'paginacion' => $paginacion->paginacion()
        ]);

    }



    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];

        $artista = new Artista;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }
            

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/artistas';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(1500,1500)->encode('jpg', 100);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(1500,1500)->encode('webp', 100);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } 


            //el objeto toma los valores de post
            $artista->sincronizar($_POST);

            //validar
            $alertas = $artista->validar();

             // Guardar el registro
             if(empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );

                // Guardar en la BD
                $resultado = $artista->guardar(); 

                if($resultado) {
                    header('Location: /admin/artistas');
                }
            }
        }
        $router->render('admin/artistas/crear', [
            'titulo' => 'Crear Artistas',
            'alertas' => $alertas,
            'artista' => $artista
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
            header('Location: /admin/artistas');
        }

        $artista = Artista::find($id);

        if(!$artista) {
            header('Location: /admin/artistas');
        }

        $artista->imagen_actual = $artista->imagen;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            

            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/artistas';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(1500,1500)->encode('jpg', 100);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(1500,1500)->encode('webp', 100);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $artista->imagen_actual;
            }
  

            $artista->sincronizar($_POST);

            $alertas = $artista->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );
                }
                $resultado = $artista->guardar();

                if($resultado) {
                    header('Location: /admin/artistas');
                }
            }
        }

        $router->render('admin/artistas/editar', [
            'titulo' => 'Actualizar Artista',
            'alertas' => $alertas,
            'artista' => $artista
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
            $artista = Artista::find($id);
            if(!isset($artista) ) {
                header('Location: /admin/artistas');
            }
            $resultado = $artista->eliminar();
            if($resultado) {
                header('Location: /admin/artistas');
            }
        }

    }
}
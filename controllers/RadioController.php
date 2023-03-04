<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Radio;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class RadioController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        //añadimos la paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/radio?page=1');
        }
        $registros_por_pagina = 10;
        $total = Radio::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/radio?page=1');
        }

        $radios = Radio::paginar($registros_por_pagina, $paginacion->offset());

    

        $router->render('admin/radio/index', [
            'titulo' => 'Radio',
            'radios' => $radios,
            'paginacion' => $paginacion->paginacion()
        ]);

    }



    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];

        $radio = new Radio;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }
            

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/radio';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } 

            //el objeto toma los valores de post
            $radio->sincronizar($_POST);

            //validar
            $alertas = $radio->validar();

             // Guardar el registro
             if(empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );

                // Guardar en la BD
                $resultado = $radio->guardar(); 

                if($resultado) {
                    header('Location: /admin/radio');
                }
            }
        }
        $router->render('admin/radio/crear', [
            'titulo' => 'Crear Programa',
            'alertas' => $alertas,
            'radio' => $radio,
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
            header('Location: /admin/radio');
        }

        $radio = Radio::find($id);

        if(!$radio) {
            header('Location: /admin/radio');
        }

        $radio->imagen_actual = $radio->imagen;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            

            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/radio';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $radio->imagen_actual;
            }


            $radio->sincronizar($_POST);

            $alertas = $radio->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );
                }
                $resultado = $radio->guardar();

                if($resultado) {
                    header('Location: /admin/radio');
                }
            }
        }

        $router->render('admin/radio/editar', [
            'titulo' => 'Actualizar Programa',
            'alertas' => $alertas,
            'radio' => $radio,
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
            $radio = Radio::find($id);
            if(!isset($radio) ) {
                header('Location: /admin/radio');
            }
            $resultado = $radio->eliminar();
            if($resultado) {
                header('Location: /admin/radio');
            }
        }

    }
}
<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Release;
use Model\Formato;
use Model\Tipo;
use Model\Artista;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ReleasesController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        //añadimos la paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/releases?page=1');
        }
        $registros_por_pagina = 10;
        $total = Release::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/releases?page=1');
        }

        $releases = Release::paginar($registros_por_pagina, $paginacion->offset());

        foreach($releases as $release) {
            $release->artista = Artista::find($release->artista_id);
            $release->formato = Formato::find($release->formato_id);
            $release->tipo = Tipo::find($release->tipo_id);
        }


        $router->render('admin/releases/index', [
            'titulo' => 'Releases',
            'releases' => $releases,
            'paginacion' => $paginacion->paginacion()
        ]);

    }


    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];

        $formatos = Formato::all();
        $tipos = Tipo::all();
        $artistas = Artista::all();
        

        $release = new Release;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }
            

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/releases';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } 

            //leer imagen2
            if(!empty($_FILES['imagen2']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/releases';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen2 = md5( uniqid( rand(), true) );

                $_POST['imagen2'] = $nombre_imagen2;
            } 


            //el objeto toma los valores de post
            $release->sincronizar($_POST);

            //validar
            $alertas = $release->validar();

             // Guardar el registro
             if(empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );

                $imagen_png2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".jpg" );
                $imagen_webp2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".webp" );

                // Guardar en la BD
                $resultado = $release->guardar(); 

                if($resultado) {
                    header('Location: /admin/releases');
                }
            }
        }
        $router->render('admin/releases/crear', [
            'titulo' => 'Crear Releases',
            'alertas' => $alertas,
            'release' => $release,
            'formatos' => $formatos,
            'tipos' => $tipos,
            'artistas' => $artistas
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
            header('Location: /admin/releases');
        }

        $formatos = Formato::all();
        $tipos = Tipo::all();
        $artistas = Artista::all();

        $release = Release::find($id);


        if(!$release) {
            header('Location: /admin/releases');
        }

        $release->imagen_actual = $release->imagen;
        $release->imagen_actual2 = $release->imagen2;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            

            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/releases';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $release->imagen_actual;
            }


            
            if(!empty($_FILES['imagen2']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/releases';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen2 = md5( uniqid( rand(), true) );

                $_POST['imagen2'] = $nombre_imagen2;
            } else {
                $_POST['imagen2'] = $release->imagen_actual2;
            }
   

            $release->sincronizar($_POST);

            $alertas = $release->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );
                }

                if(isset($nombre_imagen2)) {
                    $imagen_png2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".jpg" );
                    $imagen_webp2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".webp" );
                }
                $resultado = $release->guardar();

                if($resultado) {
                    header('Location: /admin/releases');
                }
            }
        }

        $router->render('admin/releases/editar', [
            'titulo' => 'Actualizar Release',
            'alertas' => $alertas,
            'release' => $release,
            'formatos' => $formatos,
            'tipos' => $tipos,
            'artistas' => $artistas
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
            $release = Release::find($id);
            if(!isset($release) ) {
                header('Location: /admin/releases');
                return;
            }
            $resultado = $release->eliminar();
            if($resultado) {
                header('Location: /admin/releases');
                return;
            }
        }

    }
}
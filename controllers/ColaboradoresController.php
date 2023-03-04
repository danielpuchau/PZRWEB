<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Colaborador;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ColaboradoresController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        //añadimos la paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/colaboradores?page=1');
        }
        $registros_por_pagina = 10;
        $total = Colaborador::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/colaboradores?page=1');
        }

        $colaboradores = Colaborador::paginar($registros_por_pagina, $paginacion->offset());

    
        

        $router->render('admin/colaboradores/index', [
            'titulo' => 'Family',
            'colaboradores' => $colaboradores,
            'paginacion' => $paginacion->paginacion()
        ]);

    }



    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $alertas = [];

        $colaborador = new Colaborador;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }
            

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/coronas';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } 


            // Leer imagen
            if(!empty($_FILES['imagen2']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/coronas';

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
            $colaborador->sincronizar($_POST);

            //validar
            $alertas = $colaborador->validar();

             // Guardar el registro
             if(empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );
                $imagen_png2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".jpg" );
                $imagen_webp2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".webp" );

                // Guardar en la BD
                $resultado = $colaborador->guardar(); 

                if($resultado) {
                    header('Location: /admin/colaboradores');
                }
            }
        }
        $router->render('admin/colaboradores/crear', [
            'titulo' => 'Añadir Colaborador',
            'alertas' => $alertas,
            'colaborador' => $colaborador,
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
            header('Location: /admin/coronas');
        }

        $colaborador = colaborador::find($id);

        if(!$colaborador) {
            header('Location: /admin/colaboradores');
        }

        $colaborador->imagen_actual = $colaborador->imagen;
        $colaborador->imagen_actual2 = $colaborador->imagen2;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            

            //imagen1
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/coronas';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $colaborador->imagen_actual;
            }


            //imagen2
            if(!empty($_FILES['imagen2']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/coronas';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('jpg', 80);
                $imagen_webp2 = Image::make($_FILES['imagen2']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen2 = md5( uniqid( rand(), true) );

                $_POST['imagen2'] = $nombre_imagen2;
            } else {
                $_POST['imagen2'] = $colaborador->imagen_actual2;
            }






            $colaborador->sincronizar($_POST);

            $alertas = $colaborador->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg" );
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );

                    
                }

                if(isset($nombre_imagen2)) {
                    $imagen_png2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".jpg" );
                    $imagen_webp2->save($carpeta_imagenes . '/' . $nombre_imagen2 . ".webp" );
                }


                $resultado = $colaborador->guardar();

                if($resultado) {
                    header('Location: /admin/colaboradores');
                }
            }
        }

        $router->render('admin/colaboradores/editar', [
            'titulo' => 'Actualizar Family Member',
            'alertas' => $alertas,
            'colaborador' => $colaborador,
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
            $colaborador = Colaborador::find($id);
            if(!isset($colaborador) ) {
                header('Location: /admin/colaboradores');
            }
            $resultado = $colaborador->eliminar();
            if($resultado) {
                header('Location: /admin/colaboradores');
            }
        }

    }
}
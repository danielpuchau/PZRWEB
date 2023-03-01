<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Cartela;
use MVC\Router;

class CartelaController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
       
        $cartelas = Cartela::all();
    

        $router->render('admin/cartela/index', [
            'titulo' => 'Cartela',
            'cartelas' => $cartelas
        ]);

    }



    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        

        $cartela = new Cartela;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }
            
            //el objeto toma los valores de post
            $cartela->sincronizar($_POST);


            // Guardar en la BD
            $resultado = $cartela->guardar(); 

            if($resultado) {
                header('Location: /admin/cartela');
            }
            
        }
        $router->render('admin/cartela/crear', [
            'titulo' => 'Añadir Noticia',
            'cartela' => $cartela
        ]);
    }


    
    public static function editar(Router $router) {

        if(!is_admin()) {
            header('Location: /login');
        }
        

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/cartela');
        }

        $cartela = Cartela::find($id);

        if(!$cartela) {
            header('Location: /admin/cartela');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
        
            $cartela->sincronizar($_POST);

            $resultado = $cartela->guardar();

            if($resultado) {
                header('Location: /admin/cartela');
            }
            
        }

        $router->render('admin/cartela/editar', [
            'titulo' => 'Actualizar Noticia',
            'cartela' => $cartela
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
            $cartela = Cartela::find($id);
            if(!isset($cartela) ) {
                header('Location: /admin/cartela');
            }
            $resultado = $cartela->eliminar();
            if($resultado) {
                header('Location: /admin/cartela');
            }
        }

    }
}
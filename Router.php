<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {

        $url_actual = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$url_actual] ?? null;
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }

        if ( $fn ) {

            call_user_func($fn, $this);

        } else {

            if( empty($_SERVER['PATH_INFO'])){
                header('Location: /index');
            }else{  
                header('Location: /404');
            }
            
        }
    }




    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; 
        }

        ob_start(); 

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el Layout de acuerdo a la URL
        $url_actual = $_SERVER['PATH_INFO'] ?? '/';

        if(str_contains($url_actual, '/admin')) {

            include_once __DIR__ . '/views/admin-layout.php';
            
        } if(str_contains($url_actual, '/index') || str_contains($url_actual, '/login')) {

            include_once __DIR__ . '/views/layout.php';

        } if(str_contains($url_actual, '/pzrradio')) {
            
            include_once __DIR__ . '/views/radio-layout.php';
            
            /* include_once __DIR__ . '/views/radio-layout.php'; */
        }

        if(str_contains($url_actual, '/404')) {
            
            include_once __DIR__ . '/views/layout.php';
            
            /* include_once __DIR__ . '/views/radio-layout.php'; */
        }
    }
}

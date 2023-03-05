<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\ArtistasController;
use Controllers\ReleasesController;
use Controllers\TracksController;
use Controllers\RadioController;
use Controllers\ColaboradoresController;
use Controllers\CartelaController;


use Controllers\IndexController;
use Controllers\NotFoundController;

use Controllers\ApiArtistas;
use Controllers\ApiReleases;
use Controllers\ApiSingleRelease;
use Controllers\ApiRadio;
use Controllers\ApiColaboradores;
use Controllers\ApiHome;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

//Area de Administracion
$router->get('/admin/dashboard', [DashboardController::class, 'index']);


//artistas
$router->get('/admin/artistas', [ArtistasController::class, 'index']);
$router->get('/admin/artistas/crear', [ArtistasController::class, 'crear']);
$router->post('/admin/artistas/crear', [ArtistasController::class, 'crear']);
$router->get('/admin/artistas/editar', [ArtistasController::class, 'editar']);
$router->post('/admin/artistas/editar', [ArtistasController::class, 'editar']);
$router->post('/admin/artistas/eliminar', [ArtistasController::class, 'eliminar']);


//releases
$router->get('/admin/releases', [ReleasesController::class, 'index']);
$router->get('/admin/releases/crear', [ReleasesController::class, 'crear']);
$router->post('/admin/releases/crear', [ReleasesController::class, 'crear']);
$router->get('/admin/releases/editar', [ReleasesController::class, 'editar']);
$router->post('/admin/releases/editar', [ReleasesController::class, 'editar']);
$router->post('/admin/releases/eliminar', [ReleasesController::class, 'eliminar']);


//tracks
$router->get('/admin/tracks', [TracksController::class, 'index']);
$router->get('/admin/tracks/crear', [TracksController::class, 'crear']);
$router->post('/admin/tracks/crear', [TracksController::class, 'crear']);
$router->get('/admin/tracks/editar', [TracksController::class, 'editar']);
$router->post('/admin/tracks/editar', [TracksController::class, 'editar']);
$router->post('/admin/tracks/eliminar', [TracksController::class, 'eliminar']);


//radio
$router->get('/admin/radio', [RadioController::class, 'index']);
$router->get('/admin/radio/crear', [RadioController::class, 'crear']);
$router->post('/admin/radio/crear', [RadioController::class, 'crear']);
$router->get('/admin/radio/editar', [RadioController::class, 'editar']);
$router->post('/admin/radio/editar', [RadioController::class, 'editar']);
$router->post('/admin/radio/eliminar', [RadioController::class, 'eliminar']);




//colaboradores
$router->get('/admin/colaboradores', [ColaboradoresController::class, 'index']);
$router->get('/admin/colaboradores/crear', [ColaboradoresController::class, 'crear']);
$router->post('/admin/colaboradores/crear', [ColaboradoresController::class, 'crear']);
$router->get('/admin/colaboradores/editar', [ColaboradoresController::class, 'editar']);
$router->post('/admin/colaboradores/editar', [ColaboradoresController::class, 'editar']);
$router->post('/admin/colaboradores/eliminar', [ColaboradoresController::class, 'eliminar']);


//cartela
$router->get('/admin/cartela', [CartelaController::class, 'index']);
$router->get('/admin/cartela/crear', [CartelaController::class, 'crear']);
$router->post('/admin/cartela/crear', [CartelaController::class, 'crear']);
$router->get('/admin/cartela/editar', [CartelaController::class, 'editar']);
$router->post('/admin/cartela/editar', [CartelaController::class, 'editar']);
$router->post('/admin/cartela/eliminar', [CartelaController::class, 'eliminar']);





//vistaRadio
$router->get('/pzrradio', [ApiRadio::class, 'index']);

//vista404
$router->get('/404', [NotFoundController::class, 'error']);




//api
$router->get('/api/artistas', [ApiArtistas::class, 'index']);
$router->get('/api/releases', [ApiReleases::class, 'index']);
$router->get('/api/home', [ApiHome::class, 'index']);
$router->post('/api/singleRelease', [ApiSingleRelease::class, 'index']);
$router->get('/api/singleRelease', [ApiSingleRelease::class, 'index']);
$router->get('/api/colaboradores', [ApiColaboradores::class, 'index']);



 
//index
$router->get('/index', [IndexController::class, 'index']);





$router->comprobarRutas();
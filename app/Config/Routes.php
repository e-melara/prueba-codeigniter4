<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// api routes resfull
$routes->post('/login-api', "Auth::login");
$routes->group('api', function ($routes) {
    $routes->resource('users', [
        "controller" => "UserController",
        "only" => ["show", "index", "create", "delete"]
    ]);
});

// routes for view normal
$routes->get('/login', 'AuthController::index', ['as' => 'login']);
$routes->post('/login', 'AuthController::create');
$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);

$routes->group('admin', ['filter' => 'authFilter:administrador'], function($routes) {
    $routes->get('/', 'Home::index', ['as' => 'index']);
    $routes->resource('users', ['controller' => "UsuariosController", 'as' => 'users']);
    $routes->get('users/new', 'UsuariosController::store', ['as' => 'new']);
});

$routes->group('usuario', ['filter' => 'authFilter:usuario'], function ($routes) {
    $routes->get('/', 'Home::usuario', ['as' => 'usuario']);
});
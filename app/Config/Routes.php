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
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->post('verificar_datos', 'LoginController::login');
$routes->get('logout', 'LoginController::cerrar_session');

/* DASHBOARD */
$routes->get('home', 'HomeController::index');
$routes->get('usuarios', 'UsuariosController::index');
$routes->post('delete_user', 'UsuariosController::deleteUser');
$routes->post('new_user', 'UsuariosController::nuevo_usuario');

/* CATEGORIAS */
$routes->get('categorias', 'CategoriasController::index');
$routes->post('nueva-categoria', 'CategoriasController::new');

/* MARCAS */
$routes->get('marcas', 'MarcasController::index');
$routes->post('recortar-img', 'MarcasController::croppie');
$routes->post('save-marca', 'MarcasController::savemarca');

/* DETALLES DE CONTACTO */

$routes->get('contactos', 'ContactosController::index');
$routes->post('update-contacto', 'ContactosController::update');

/* CONFIGURACIÓN */
$routes->get('carousel', 'ConfiguracionController::carousel_edit');
$routes->post('upload_pic', 'ConfiguracionController::upload_pic');

$routes->get('mision-vision', 'ConfiguracionController::mision_y_vision_edit');
$routes->post('update/mision-vision', 'ConfiguracionController::update_mision_vision');

$routes->get('politica-compromiso', 'ConfiguracionController::politica_compromiso_edit');
$routes->post('update/politica-compromiso', 'ConfiguracionController::update_politica_compromiso');

$routes->get('historia-edit', 'ConfiguracionController::historia_edit');
$routes->post('update/historia-frase', 'ConfiguracionController::update_historia_frase');

$routes->post('upload_pic/historia', 'ConfiguracionController::upload_pic_historia');
$routes->post('update/lemas-sublemas', 'ConfiguracionController::update_lemas_sublemas');
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

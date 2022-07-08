<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/produk', 'Home::produk');
$routes->get('home/mobilList', 'Home::mobilList');
$routes->get('home/allmobilList', 'Home::allmobilList');
$routes->get('home/login', 'Home::login');
$routes->post('home/auth', 'Home::auth');
$routes->get('home/logout', 'Home::logout');
$routes->get('home/register', 'Home::register');
$routes->post('home/registerPost', 'Home::registerPost');
$routes->get('home/sewa', 'Home::sewa',['filter' => 'auth']);
$routes->post('home/sewaPost', 'Home::sewaPost');


$routes->get('jenisperawatan/', 'jenisperawatan::index',['filter' => 'auth']);
$routes->post('jenisperawatan/getAll', 'jenisperawatan::getAll');
$routes->post('jenisperawatan/add', 'jenisperawatan::add');
$routes->post('jenisperawatan/edit', 'jenisperawatan::edit');
$routes->post('jenisperawatan/remove', 'jenisperawatan::remove');
$routes->post('jenisperawatan/getOne', 'jenisperawatan::getOne');

$routes->get('merks/', 'merks::index',['filter' => 'auth']);
$routes->post('merks/getAll', 'merks::getAll');
$routes->post('merks/add', 'merks::add');
$routes->post('merks/edit', 'merks::edit');
$routes->post('merks/remove', 'merks::remove');
$routes->post('merks/getOne', 'merks::getOne');

$routes->get('mobils/', 'mobils::index',['filter' => 'auth']);
$routes->post('mobils/getAll', 'mobils::getAll');
$routes->post('mobils/add', 'mobils::add');
$routes->post('mobils/edit', 'mobils::edit');
$routes->post('mobils/upload', 'mobils::upload');
$routes->post('mobils/remove', 'mobils::remove');
$routes->post('mobils/getOne', 'mobils::getOne');
$routes->get('mobils/getMerks', 'mobils::getMerks');

$routes->get('perawatans/', 'perawatans::index',['filter' => 'auth']);
$routes->post('perawatans/getAll', 'perawatans::getAll');
$routes->post('perawatans/add', 'perawatans::add');
$routes->post('perawatans/edit', 'perawatans::edit');
$routes->post('perawatans/remove', 'perawatans::remove');
$routes->post('perawatans/getOne', 'perawatans::getOne');
$routes->get('perawatans/getMobilMerks', 'perawatans::getMobilMerks');
$routes->get('perawatans/getJenisPerawatans', 'perawatans::getJenisPerawatans');

$routes->get('users/', 'users::index',['filter' => 'auth']);
$routes->post('users/getAll', 'users::getAll');
$routes->post('users/add', 'users::add');
$routes->post('users/edit', 'users::edit');
$routes->post('users/remove', 'users::remove');
$routes->post('users/getOne', 'users::getOne');



$routes->get('/dashboard', 'Dashboard::index');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

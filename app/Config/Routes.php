<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth/check', 'Auth::user');
$routes->post('/auth/create', 'Auth::createAccount');

// untuk masuk ke dasboard
$routes->get('/dashboard', 'Users::index');

// untuk edit product
$routes->get('/dashboard/edit/(:segment)', 'Users::productEdit/$1');
$routes->post('/admin/update-product', 'Users::updateProduct');


// untuk delete product
$routes->get('/dashboard/delete/(:segment)', 'Users::productDelete/$1');

// untuk menambah produk
$routes->get('/admin/add-product', 'Users::addProduct');
$routes->post('/admin/save-product', 'Users::saveProduct');

// untuk masuk ke create
$routes->get('/user/create/(:segment)', 'Users::create/$1');

// method save create
$routes->get('/user/save', 'Users::save');

// untuk masuk detail
$routes->get('/user/detail/(:segment)', 'Users::detail/$1');

//user untuk masuk ke catatan keranjang
$routes->get('/user/histori', 'Users::keranjang');

// pengguna registrasi
$routes->get('/auth/register', 'Auth::register');

// managament superadmin
$routes->get('/superadmin/manage', 'SuperAdmin::index');

// menu untuk me-manage admin / melihat data untuk update
$routes->get('/superadmin/manage-admin', 'SuperAdmin::manage');

// untuk menambahkan admin
$routes->get('/superadmin/add-admin', 'SuperAdmin::create');

// untuk mengedit admin
$routes->get('/superadmin/edit-admin/(:segment)', 'SuperAdmin::editAdmin/$1');

// untuk menjalankan fungsi update
$routes->post('/superadmin/update', 'SuperAdmin::edit');

// untuk menjalankan fungsi update
$routes->post('/superadmin/add', 'SuperAdmin::add');





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

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
$routes->setDefaultController('User\Auth');
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
$routes->get('/', 'User\Auth::index', ['filter' => 'noauthsie']);

// SIKAPERDES OTENTIKASI
$routes->get('/user/blocked', 'User\Auth::blocked');
$routes->get('/user/logout', 'User\Auth::logout');
$routes->add('/user/login', 'User\Auth::index', ['filter' => 'noauthsie']);
$routes->add('/user/verify', 'User\Auth::verify');
$routes->add('/user/resetpassword', 'User\Auth::resetpassword');
$routes->add('/user/konfirmasi-email', 'User\Auth::confirm_email');
$routes->add('/user/konfirmasi-resetpass', 'User\Auth::confirm_resetpass');
// $routes->match(['get', 'post'], '/user/registrasi', 'User\Auth::registration', ['filter' => 'noauthsie']);
// $routes->match(['get', 'post'], '/user/auth/registration', 'User\Auth::registration', ['filter' => 'noauthsie']);
$routes->match(['get', 'post'], '/user/lupa-password', 'User\Auth::forgotpassword', ['filter' => 'noauthsie']);
$routes->match(['get', 'post'], '/user/auth/forgotpassword', 'User\Auth::forgotpassword', ['filter' => 'noauthsie']);
$routes->match(['get', 'post'], '/user/auth/changepassword', 'User\Auth::changepassword', ['filter' => 'noauthsie']);
$routes->match(['get', 'post'], '/user/ganti-password', 'User\Auth::changepassword', ['filter' => 'noauthsie']);
$routes->get('/user/panel/(:any)', 'User\Auth::$1', ['filter' => 'noauthsie']);
$routes->get('/user/panel', 'User\Auth::index', ['filter' => 'noauthsie']);
$routes->add('/user/(:any)', 'User\Auth::index', ['filter' => 'noauthsie']);
$routes->add('/user', 'User\Auth::index', ['filter' => 'noauthsie']);

// SIKAPERDES USER ADMIN KONTEN
$routes->delete('/user/admin/hapususer/(:num)/(:any)', 'User\Admin::hapususer/$1/$2', ['filter' => 'authusersie']);
$routes->delete('/user/admin/hapususerapi/(:num)', 'User\Admin::hapususerapi/$1', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/admin/editprofile', 'User\Admin::editprofile', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/admin/ganti_password', 'User\Admin::changepassword', ['filter' => 'authusersie']);
$routes->put('/user/admin/role_access/(:num)', 'User\Admin::role_access/$1', ['filter' => 'authusersie']);
$routes->put('/user/admin/role_edit/(:any)/(:any)', 'User\Admin::role_edit/$1/$2', ['filter' => 'authusersie']);
$routes->post('/user/admin/registrasi_api', 'User\Admin::registrasi_api', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/admin/(:any)', 'User\Admin::$1', ['filter' => 'authusersie']);
$routes->get('/user/admin/dashboard', 'User\Admin::dashboard', ['filter' => 'authusersie']);
$routes->get('/user/admin', 'User\Admin::dashboard', ['filter' => 'authusersie']);

// MENU USER ADMIN SIKAPERDES
$routes->get('/user/menu-admin/list_input_data_kawasan', 'User\Menu_admin::listinputdatakawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/list_datainput_kawasan', 'User\Menu_admin::list_datainput_kawasan', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/delete_data_kawasan/(:any)/(:any)', 'User\Menu_admin::deletedatakawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/input_data_kawasan', 'User\Menu_admin::inputdatakawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/verifikasi_review/(:any)/(:any)', 'User\Menu_admin::verifikasireview/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/revisi_review/(:any)/(:any)', 'User\Menu_admin::revisidatainputkawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajaxfiltkecamatan', 'User\Menu_admin::ajaxfiltkecamatan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajaxfiltdesa', 'User\Menu_admin::ajaxfiltdesa', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/verifikasi_data', 'User\Menu_admin::verifikasi_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/load_data_kawasan', 'User\Menu_admin::load_data_kawasan', ['filter' => 'authusersie']);

// DATA USER SIKAPERDES
$routes->match(['get', 'post'], '/user/data/verifikasi_review/(:any)/(:any)', 'User\Data::verifikasireview/$1/$2', ['filter' => 'authusersie']);
$routes->get('/user/data/kawasan', 'User\Data::verifikasi_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/data/load_data_kawasan', 'User\Data::load_data_kawasan', ['filter' => 'authusersie']);
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

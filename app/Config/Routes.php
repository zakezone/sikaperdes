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
$routes->setAutoRoute(false);

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
$routes->match(['get', 'post'], '/user/menu-admin/input_data_kawasan', 'User\Menu_admin::inputdatakawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/daftar_kawasan', 'User\Menu_admin::list_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/jenis_klasifikasi_list', 'User\Menu_admin::list_klasifikasi', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/input_daftar_kawasan', 'User\Menu_admin::inputdaftarkawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/input_jenis_klasifikasi', 'User\Menu_admin::inputjenisklasifikasi', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/delete_daftar_kawasan/(:any)/(:any)', 'User\Menu_admin::deletedaftarkawasan/$1/$2', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/delete_jenis_klasifikasi/(:any)', 'User\Menu_admin::deletejenisklasifikasi/$1', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/delete_data_kawasan/(:any)/(:any)', 'User\Menu_admin::deletedatakawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/verifikasi_review/(:any)/(:any)', 'User\Menu_admin::verifikasireview/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/edit_daftar_kawasan/(:any)/(:any)', 'User\Menu_admin::editdaftarkawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/edit_jenis_klasifikasi/(:any)', 'User\Menu_admin::editjenisklasifikasi/$1', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/edit_nama_klasifikasi', 'User\Menu_admin::editnamaklasifikasi/$1', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/revisi_review/(:any)/(:any)', 'User\Menu_admin::revisidatainputkawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajaxfiltkecamatan', 'User\Menu_admin::ajaxfiltkecamatan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajaxfiltdesa', 'User\Menu_admin::ajaxfiltdesa', ['filter' => 'authusersie']);
$routes->get('/user/menu-admin/verifikasi_data', 'User\Menu_admin::verifikasi_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/load_data_kawasan', 'User\Menu_admin::load_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajax_list_daftar_kawasan', 'User\Menu_admin::ajax_list_daftar_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-admin/ajax_list_jenis_klasifikasi', 'User\Menu_admin::ajax_list_jenis_klasifikasi', ['filter' => 'authusersie']);

// SIKAPERDES USER PROVINSI KONTEN
$routes->match(['get', 'post'], '/user/provinsi/editprofile', 'User\Provinsi::editprofile', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/provinsi/ganti_password', 'User\Provinsi::changepassword', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/provinsi/(:any)', 'User\Provinsi::$1', ['filter' => 'authusersie']);
$routes->get('/user/provinsi/dashboard', 'User\Provinsi::dashboard', ['filter' => 'authusersie']);
$routes->get('/user/provinsi', 'User\Provinsi::dashboard', ['filter' => 'authusersie']);

// MENU USER PROVINSI SIKAPERDES
$routes->match(['get', 'post'], '/user/menu-provinsi/verifikasi_review/(:any)/(:any)', 'User\Menu_provinsi::verifikasireview/$1/$2', ['filter' => 'authusersie']);
$routes->get('/user/menu-provinsi/verifikasi_data', 'User\Menu_provinsi::verifikasi_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-provinsi/load_data_kawasan', 'User\Menu_provinsi::load_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-provinsi/ajaxfiltkecamatan', 'User\Menu_provinsi::ajaxfiltkecamatan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-provinsi/ajaxfiltdesa', 'User\Menu_provinsi::ajaxfiltdesa', ['filter' => 'authusersie']);

// SIKAPERDES USER KABUPATEN KONTEN
$routes->match(['get', 'post'], '/user/kabupaten/editprofile', 'User\Kabupaten::editprofile', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/kabupaten/ganti_password', 'User\Kabupaten::changepassword', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/kabupaten/(:any)', 'User\Kabupaten::$1', ['filter' => 'authusersie']);
$routes->get('/user/kabupaten/dashboard', 'User\Kabupaten::dashboard', ['filter' => 'authusersie']);
$routes->get('/user/kabupaten', 'User\Kabupaten::dashboard', ['filter' => 'authusersie']);

// MENU USER KABUPATEN SIKAPERDES
$routes->get('/user/menu-kabupaten/list_input_data_kawasan', 'User\Menu_kabupaten::listinputdatakawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-kabupaten/list_datainput_kawasan', 'User\Menu_kabupaten::list_datainput_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-kabupaten/input_data_kawasan', 'User\Menu_kabupaten::inputdatakawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-kabupaten/revisi_review/(:any)/(:any)', 'User\Menu_kabupaten::revisidatainputkawasan/$1/$2', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-kabupaten/ajaxfiltkecamatan', 'User\Menu_kabupaten::ajaxfiltkecamatan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/menu-kabupaten/ajaxfiltdesa', 'User\Menu_kabupaten::ajaxfiltdesa', ['filter' => 'authusersie']);
$routes->get('/user/menu-kabupaten/delete_data_kawasan/(:any)/(:any)', 'User\Menu_kabupaten::deletedatakawasan/$1/$2', ['filter' => 'authusersie']);

// SIKAPERDES USER KECAMATAN KONTEN
$routes->match(['get', 'post'], '/user/kecamatan/editprofile', 'User\Kecamatan::editprofile', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/kecamatan/ganti_password', 'User\Kecamatan::changepassword', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/kecamatan/(:any)', 'User\Kecamatan::$1', ['filter' => 'authusersie']);
$routes->get('/user/kecamatan/dashboard', 'User\Kecamatan::dashboard', ['filter' => 'authusersie']);
$routes->get('/user/kecamatan', 'User\Kecamatan::dashboard', ['filter' => 'authusersie']);

// MENU USER KECAMATAN SIKAPERDES
// Belum ada menu untuk kecamatan

// SIKAPERDES USER PEMDES KONTEN
$routes->match(['get', 'post'], '/user/pemdes/editprofile', 'User\Pemdes::editprofile', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/pemdes/ganti_password', 'User\Pemdes::changepassword', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/pemdes/(:any)', 'User\Pemdes::$1', ['filter' => 'authusersie']);
$routes->get('/user/pemdes/dashboard', 'User\Pemdes::dashboard', ['filter' => 'authusersie']);
$routes->get('/user/pemdes', 'User\Pemdes::dashboard', ['filter' => 'authusersie']);

// MENU USER PEMDES SIKAPERDES
// Belum ada menu untuk pemdes

// DATA USER SIKAPERDES
$routes->match(['get', 'post'], '/user/data/verifikasi_review/(:any)/(:any)', 'User\Data::verifikasireview/$1/$2', ['filter' => 'authusersie']);
$routes->get('/user/data/kawasan', 'User\Data::verifikasi_data_kawasan', ['filter' => 'authusersie']);
$routes->match(['get', 'post'], '/user/data/load_data_kawasan', 'User\Data::load_data_kawasan', ['filter' => 'authusersie']);

// API SIKAPERDES
$routes->post('/api/auth', 'Api\Auth::index');
$routes->get('/api/kawasan', 'Api\Kawasan::index');
// $routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
//     $routes->resource('Auth');
//     $routes->resource('Kawasan');
// });

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

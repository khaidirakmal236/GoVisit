<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// User routes
$routes->get('/',         'User\Home::index');
$routes->get('/home',     'User\Home::index');
$routes->get('/about-us', 'User\Home::about_us');
$routes->get('/monkey',   'User\Home::monkey');

$routes->get('/eksplorasi',           'User\Eksplorasi::index');
$routes->get('/api/suggest',          'User\Eksplorasi::suggest');
$routes->get('/hidden-gem',           'User\HiddenGem::index');
$routes->get('/tempat/(:num)',        'User\Tempat::detail/$1');
$routes->post('/ulasan/simpan',       'User\Ulasan::simpan');

// Admin login (publik)
$routes->get('/admin/login',          'Admin\Login::index');
$routes->post('/admin/login/proses',  'Admin\Login::proses');
$routes->get('/admin/logout',         'Admin\Login::logout');

// Admin routes (protected)
$routes->group('admin', ['filter' => 'authAdmin'], static function($routes) {
    $routes->get('/',                'Admin\Dashboard::index');
    $routes->get('tambah',          'Admin\Dashboard::tambah');
    $routes->post('simpan',         'Admin\Dashboard::simpan');
    $routes->get('edit/(:num)',     'Admin\Dashboard::edit/$1');
    $routes->post('update/(:num)',  'Admin\Dashboard::update/$1');
    $routes->get('hapus/(:num)',    'Admin\Dashboard::hapus/$1');
});

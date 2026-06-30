<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/',         'Home::index');
$routes->get('/home',     'Home::index');
$routes->get('/about-us', 'Home::about_us');
$routes->get('/monkey',   'Home::monkey');

// goVisit routes
$routes->get('/eksplorasi',           'Eksplorasi::index');
$routes->get('/api/suggest',          'Eksplorasi::suggest');
$routes->get('/hidden-gem',           'HiddenGem::index');
$routes->get('/tempat/(:num)',        'Tempat::detail/$1');
$routes->post('/ulasan/simpan',       'Ulasan::simpan');

// Admin login (publik)
$routes->get('/admin/login',          'LoginAdmin::index');
$routes->post('/admin/login/proses',  'LoginAdmin::proses');
$routes->get('/admin/logout',         'LoginAdmin::logout');

// Admin routes (protected)
$routes->group('admin', ['filter' => 'authAdmin'], static function($routes) {
    $routes->get('/',                'Admin::index');
    $routes->get('tambah',          'Admin::tambah');
    $routes->post('simpan',         'Admin::simpan');
    $routes->get('edit/(:num)',     'Admin::edit/$1');
    $routes->post('update/(:num)',  'Admin::update/$1');
    $routes->get('hapus/(:num)',    'Admin::hapus/$1');
});
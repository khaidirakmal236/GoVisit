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
$routes->get('/hidden-gem',           'HiddenGem::index');
$routes->get('/tempat/(:num)',        'Tempat::detail/$1');
$routes->post('/ulasan/simpan',       'Ulasan::simpan');

// Admin routes
$routes->get('/admin',                'Admin::index');
$routes->get('/admin/tambah',         'Admin::tambah');
$routes->post('/admin/simpan',        'Admin::simpan');
$routes->get('/admin/edit/(:num)',    'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/hapus/(:num)',   'Admin::hapus/$1');
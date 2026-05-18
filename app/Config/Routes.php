<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/home',     'Home::index');
$routes->get('/about-us', 'Home::about_us');
$routes->get('/monkey',   'Home::monkey');

// ============================================================
// GoVisit — 5 Halaman Utama
// ============================================================
$routes->get('/',                   'GoVisit::beranda');    // 1. Beranda
$routes->get('/govisit/beranda',    'GoVisit::beranda');    // 1. Beranda (alternatif)
$routes->get('/govisit/eksplorasi', 'GoVisit::eksplorasi'); // 2. Eksplorasi
$routes->get('/govisit/detail/(:num)', 'GoVisit::detail/$1'); // 3. Detail Tempat
$routes->get('/govisit/login',      'GoVisit::login');      // 4. Login
$routes->get('/govisit/tentang',    'GoVisit::tentang');    // 5. Tentang Kami


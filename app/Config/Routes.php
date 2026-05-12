<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->get('/about-us', 'Home::about_us');
$routes->get('/cafe', 'Home::cafe');
$routes->get('/wisata', 'Home::wisata');
$routes->get('/hidden-gems', 'Home::hidden_gems');
$routes->get('/hidden-gems/(:any)', 'Home::hidden_gems/$1');
#awkwkwwkwkwkwkwkwkwkwkwkwkw
#tetau ini apa



<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/create', 'Home::createMahasiswa');
// $routes->get('/.num', 'Home::detailMahasiswa/$1');
$routes->get('/About', 'About::index');
$routes->get('/tugas2', 'Home::tugas2');
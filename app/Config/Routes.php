<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/About', 'About::index');
$routes->get('/tugas2', 'Home::tugas2');
$routes->post('/create', 'Home::createMahasiswa');
$routes->get('/(:num)', 'Home::detailMahasiswa/$1');
$routes->get('/updateMahasiswa/(:num)', 'Home::updateMahasiswa/$1');
$routes->post('/updateMahasiswa/update/(:num)', 'Home::updateMahasiswaAction/$1');
$routes->get("delete/(:num)", 'Home::deleteMahasiswa/$1');
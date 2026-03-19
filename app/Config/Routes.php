<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Storefront::index');
$routes->get('/products_catalog_view', 'ProductsCatalog::index');
$routes->match(['get', 'post'], '/auth/register', 'Auth::register');
$routes->match(['get', 'post'], '/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
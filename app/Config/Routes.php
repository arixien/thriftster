<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Storefront::index');
$routes->get('/products_catalog_view', 'ProductsCatalog::index');
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
$routes->get('/search', 'Search::index');
$routes->get('/account', 'Account::index');
$routes->get('/orders', 'Orders::index');
$routes->get('/wishlist', 'Wishlist::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/admin_dashboard', 'Dashboard::index');
$routes->get('/admin/products', 'AdminProducts::index');
$routes->get('/admin/products/add', 'AdminProducts::add');
$routes->get('/admin/products/edit', 'AdminProducts::edit');
$routes->get('/admin/orders', 'AdminOrders::index');
$routes->get('/admin/orders/view', 'AdminOrders::view');

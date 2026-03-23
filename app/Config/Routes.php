<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Storefront ───────────────────────────────────────────────
$routes->get('/', 'Storefront::index');
$routes->get('/products_catalog_view', 'ProductsCatalog::index');
$routes->get('/search', 'Search::index');
$routes->get('/product/(:num)', 'ProductDetail::index/$1');

// ── Auth ─────────────────────────────────────────────────────
$routes->match(['get', 'post'], '/auth/register', 'Auth::register');
$routes->match(['get', 'post'], '/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

// ── User Pages ───────────────────────────────────────────────
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/account', 'Account::index');
$routes->get('/orders', 'Orders::index');
$routes->get('/wishlist', 'Wishlist::index');
$routes->get('profile', 'Profile::index');
$routes->get('profile/edit', 'Profile::edit');
$routes->post('profile/edit', 'Profile::update');

// ── Cart & Checkout ──────────────────────────────────────────
$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
$routes->get('/checkout', 'Checkout::index');
$routes->post('/checkout/place', 'Checkout::place');
$routes->get('/order/success', 'Checkout::success');

// ── Admin ────────────────────────────────────────────────────
$routes->get('/admin_dashboard', 'Dashboard::index');
$routes->get('/admin/products', 'AdminProducts::index');
$routes->get('/admin/products/add', 'AdminProducts::add');
$routes->get('/admin/products/edit/(:num)', 'AdminProducts::edit/$1');
$routes->get('/admin/products/delete/(:num)', 'AdminProducts::delete/$1');
$routes->get('/admin/orders', 'AdminOrders::index');
$routes->get('/admin/orders/view', 'AdminOrders::view');
$routes->post('/admin/products/store',         'AdminProducts::store');
$routes->post('/admin/products/update/(:num)', 'AdminProducts::update/$1');
$routes->get('/admin/products/delete/(:num)', 'AdminProducts::delete/$1');

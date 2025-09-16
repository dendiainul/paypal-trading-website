<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Order routes
$routes->get('order', 'Order::index');
$routes->get('order/buy-paypal', 'Order::buyPaypal');
$routes->get('order/sell-paypal', 'Order::sellPaypal');
$routes->get('order/payment-service', 'Order::paymentService');
// Admin routes
$routes->get('admin', 'Admin::index');
$routes->get('admin/orders', 'Admin::orders');
$routes->get('admin/rates', 'Admin::rates');
$routes->get('admin/cms', 'Admin::cms');

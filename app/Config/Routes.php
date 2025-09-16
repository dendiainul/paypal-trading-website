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

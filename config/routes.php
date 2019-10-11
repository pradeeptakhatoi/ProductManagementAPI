<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    $routes->setExtensions(['json', 'xml']);
    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);    
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    
    $routes->fallbacks('DashedRoute');
   $routes->fallbacks(DashedRoute::class);
});


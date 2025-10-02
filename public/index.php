<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/** @var array $routes */
$routes = require_once dirname(__DIR__) . '/config/routes.php';

$currentRoute = array_filter($routes, function ($route) {
    $path   = $_SERVER['PATH_INFO'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

    return $route['path'] === $path && $route['method'] === $method;
});

$currentRoute = empty($currentRoute) ? null : array_shift($currentRoute);

if (! $currentRoute) {
    require dirname(__DIR__) . '/pages/video-list.php';
} else {
    require dirname(__DIR__) . '/pages/' . $currentRoute['file'];
}

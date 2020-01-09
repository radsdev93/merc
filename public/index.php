<?php

require __DIR__ . '/../vendor/autoload.php';

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;

$path = $_SERVER['REQUEST_URI'];
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

session_start();

$isLoginRoute = stripos($path, 'entra');
if (!isset($_SESSION['logado']) && $isLoginRoute === false) {
    header('Location: /entrar');
    exit();
}

$controllerClass = $routes[$path];
/** @var RequestHandlerInterface $controller */
$controller = new $controllerClass();
$controller->handle();

<?php

$routes = json_decode(file_get_contents('autoLoad.json'), true);

spl_autoload_register(function($class) {
    global $routes;

    $disassembled = explode('\\', $class);
    $className = array_pop($disassembled);

    foreach ($routes as $route) {

        $classRoute = $route . '/'. $className . '.php';

        if (file_exists($classRoute)) {
            require_once $classRoute;
        }
    }
});

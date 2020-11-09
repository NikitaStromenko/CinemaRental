<?php

class Router {
    private static $list = [];

    public static function addRoutes($route) {
        self::$list[] = [
            $route::$BASE => $route::getRouteList()
        ];
    }

    public static function enable() {
        $uri = $_GET['q'];
        $params = explode("/", $uri);
        $nameEndpoint = array_shift($params);

        foreach (self::$list as $names) {

            if (key($names) === $nameEndpoint) {

                foreach ($names[$nameEndpoint] as $routeKey => $route) {

                    if ($route === $uri) {
                        $tt = '\\' . $nameEndpoint . '\\' . 'Routes';

                        $tt::execute($routeKey);
                    }
                }
            }
        }
    }
}
<?php

class Router
{
    private static $list = [];

    public static function addRoutes($route)
    {
        self::$list[] = [
            $route::$BASE => $route::getRouteList()
        ];
    }

    public static function enable()
    {
        $uri = $_GET['q'];
        $params = explode("/", $uri);
        array_pop($params);
        $nameEndpoint = implode('/', $params);

        $notFound = true;
        foreach (self::$list as $names) {

            if (key($names) === $nameEndpoint) {

                foreach ($names[$nameEndpoint] as $routeKey => $route) {

                    if ($route === $uri) {
                        try {
                            $tt = '\\' . str_replace('/', '\\', $nameEndpoint) . '\\' . 'Routes';
                            $tt::execute($routeKey);

                            $notFound = false;
                        } catch (Exception $e) {
                            $e->getMessage();
                        }
                    }
                }
            }
        }

        if ($notFound) {
            try {
                throw new Exception('Not found');
            } catch (Exception $e) {
                header_remove();
                http_response_code(404);
                echo $e->getMessage();
            }
        }
    }
}
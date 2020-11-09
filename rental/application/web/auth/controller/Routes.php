<?php

namespace Auth;

class Routes {
    public static $BASE = "auth";

    public static $HELLO = 'auth/hello';

    public static function getRouteList() {
        return array("hello" => self::$HELLO);
    }

    public static function execute($endpointName) {
        AuthEndpoints::$endpointName();
    }
}

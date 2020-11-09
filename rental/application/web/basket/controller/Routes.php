<?php

namespace Basket;

class Routes {
    public static $BASE = "basket";

    public static $HELLO = 'basket/hello';

    public static function getRouteList() {
        return array("hello" => self::$HELLO);
    }
}

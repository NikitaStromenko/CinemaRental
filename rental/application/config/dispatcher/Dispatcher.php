<?php

$authRoutes = new \Auth\Routes();
$basketRoutes = new \Basket\Routes();

Router::addRoutes($authRoutes);
Router::addRoutes($basketRoutes);
Router::enable();

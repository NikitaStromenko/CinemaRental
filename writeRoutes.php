<?php

$routes = array();
function findDirectories($dir) {
    global $routes;
    $ffs = scandir($dir);

    foreach ($ffs as $ff) {
        if ($ff != '.' && $ff != '..') {
            if (is_dir($dir.'/'.$ff)) {
                $routes[] = $dir.'/'.$ff;
                findDirectories($dir.'/'.$ff);
            }
        }
    }
}

function writeRoutes($dir) {
    global $routes;
    findDirectories($dir);

    $fp = fopen('autoLoad.json', 'w');
    fwrite($fp, json_encode($routes));
    fclose($fp);
}



<?php

spl_autoload_register(function($class_name) {
    $filename = str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});

define('APP_PATH', dirname(__DIR__));

if ( ! function_exists('getallheaders')) {

    function getallheaders() {
        $headers = '';
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

} 
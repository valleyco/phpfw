<?php

spl_autoload_register('__autoloader');

function __autoloader($class_name) {
    include str_replace('\\', '/', $class_name) . '.php';
}

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
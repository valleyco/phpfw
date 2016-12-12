<?php

define('APP_PATH', dirname(__DIR__));

spl_autoload_register(function($class_name) {
    $prefix = 'Valleyco\\Phpfw\\';
    if (substr($class_name, 0, strlen($prefix)) === $prefix) {
        $filename = APP_PATH . '/' . str_replace('\\', '/', substr($class_name, strlen($prefix))) . '.php';
        if (file_exists($filename)) {
            include $filename;
        }
    }
});


if ( ! function_exists('getallheaders')) {

    function getallheaders() {
        $headers = '';
        foreach (filter_input_array(INPUT_SERVER) as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

} 
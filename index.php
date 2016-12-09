<?php

spl_autoload_register('__autoloader');

$router = new System\Router($_SERVER, $_REQUEST, $_GET, $_POST);

$router();

function __autoloader($class_name) {
    include str_replace('\\', '/', $class_name) . '.php';
}

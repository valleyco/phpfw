<?php
spl_autoload_register('__autoloader') ;
$uri_parts = parse_url($_SERVER['REQUEST_URI']);
//echo
json_encode(
        [
            'Server' => $_SERVER,
            'Uri' => $uri_parts
        ]
);
//exit;
$defaultController = 'home';
$defaultAction = 'index';

$parts =  split('/', $uri_parts['path']);

array_shift($parts);

if($parts && !$parts[0]){
    $parts = [];
}

switch (count($parts)) {
    case 0:
        $controllerName = $defaultController;
        $action = $defaultAction;
        break;
    case 1:
        $controllerName = array_shift($parts);
//        $controllerName = $controllerName ? $controllerName : $defaultController;
        $action = $defaultAction;
        break;
    default:
        $controllerName = array_shift($parts);
        $action = array_shift($parts);
        break;
}

$controllerClass = ucfirst(strtolower($controllerName)) . 'Controller';

$controller = new $controllerClass;

$controller->$action($parts);



function __autoloader($class_name){
    include $class_name.'.php';
}







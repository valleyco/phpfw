<?php

namespace Valleyco\Phpfw\System;

class Router {

    private $server, $get, $post;
    private $defaultController = 'home';
    private $defaultAction = 'index';

    function __construct(array $server, $get, $post) {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    function __invoke() {
        $uri_parts = parse_url($this->server['REQUEST_URI']);
        $clean_uri = trim($uri_parts['path'], '/');
        $parts = $clean_uri ? explode('/', $clean_uri) : [];

        switch (count($parts)) {
            case 0:
                $controllerName = $this->defaultController;
                $actionName = $this->defaultAction;
                break;
            case 1:
                $controllerName = array_shift($parts);
                $actionName = $this->defaultAction;
                break;
            default:
                $controllerName = array_shift($parts);
                $actionName = array_shift($parts);
                break;
        }

        $controllerClass = 'Valleyco\\Phpfw\\Controller\\' . ucfirst(strtolower($controllerName)) . 'Controller';

        if ( ! class_exists($controllerClass) || ! method_exists($controllerClass, $actionName)) {
            return false;
        }

        $controller = new $controllerClass;

        call_user_func_array([$controller, $actionName], $parts);
    }

}

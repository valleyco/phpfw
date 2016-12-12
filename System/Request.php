<?php

namespace Valleyco\Phpfw\System;

/**
 * Description of Request
 *
 * @author david
 */
class Request {

    private $server;
    private $get;
    private $post;

    const
        METHOD_GET = 'GET',
        METHOD_POST = 'POST',
        METHOD_DELETE = 'DELETE',
        METHOD_PUT = 'PUT'

    ;

    function __construct(array $server, $get, $post) {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    function getMethod() {
        return $this->server['REQUEST_METHOD'];
    }

    function getContentType() {
        return isset($this->server['CONTENT_TYPE']) ? $this->server['CONTENT_TYPE'] : null;
    }

    function getQueryParam($name) {
        return isset($this->get[$name]) ? $this->get[$name] : null;
    }

    function getPostParam($name) {
        return isset($this->post[$name]) ? $this->post[$name] : null;
    }

}

<?php

namespace Valleyco\Phpfw\System;

/**
 * Description of Controller
 *
 * @author david
 */
class Controller {

    protected $view;

    function __construct() {
        $this->view = new View(APP_PATH . '/View');
    }

}

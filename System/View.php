<?php

namespace Valleyco\Phpfw\System;

/**
 * Description of View
 *
 * @author david
 */
class View {

    private $viewDirectory;

    function __construct($viewDirectory) {
        $this->viewDirectory = rtrim($viewDirectory, '/');
    }

    public function render($viewFile, array $vars = [], $asString = true) {
        if ($asString) {
            ob_start();
        }
        $filename = $this->viewDirectory . "/$viewFile";
        $this->doRender($filename, $vars);
        if ($asString) {
            $result = ob_get_contents();
            ob_end_clean();
        } else {
            $result = null;
        }
        return $result;
    }

    private function doRender(/* $filename, array $vars */) {
        extract(func_get_arg(1));
        include func_get_arg(0);
    }

}

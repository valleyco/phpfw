<?php

if (preg_match('/\.(?:js|png|jpg|jpeg|gif|css|woff|ttf|eot|svg|otf|html)/', strtolower(filter_input(INPUT_SERVER, 'REQUEST_URI')))) {
    chdir(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
    return false;    // serve the requested resource as-is.
} else {
    include 'index.php';
}
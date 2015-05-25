<?php
chdir('httpdocs');
if (preg_match('/\.(?:js|png|jpg|jpeg|gif|css|woff|ttf|eot|svg|otf)/',  strtolower($_SERVER["REQUEST_URI"]))) {
    return false;    // serve the requested resource as-is.
} else {
    include 'index.php';
}
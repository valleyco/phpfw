<?php
include './System/Bootstrap.php';

$router = new System\Router($_SERVER, $_REQUEST, $_GET, $_POST);

$router();


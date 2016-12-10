<?php

include './System/Bootstrap.php';

$router = new System\Router(filter_input_array(INPUT_SERVER), filter_input_array(INPUT_GET), filter_input_array(INPUT_POST));

$router();


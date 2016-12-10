<?php

namespace Controller;

class HomeController {

    private $view;

    function __construct() {
        $this->view = new \System\View(APP_PATH . '/View');
    }

    function index() {
        echo
        "<html>
        <head>
         <title>this is the title</title>
        </head>
        <body>

         <h1>Hello World</h1>

        </body>
       </html>";
    }

    function hello($name = 'World') {
        $this->view->render('Home/hello.php', ['name' => $name], FALSE);
    }

    function say() {
        echo
        "<html>
            <head>
             <title>this is the title</title>
            </head>
            <body>

             <h1>Say It</h1>

            </body>
        </html>";
    }

}

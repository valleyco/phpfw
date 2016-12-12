<?php

namespace Valleyco\Phpfw\Controller;

use Valleyco\Phpfw\System\Controller;

class HomeController extends Controller {

    function index($name = 'World') {
        echo
        "<html>
        <head>
         <title>this is the title</title>
        </head>
        <body>

         <h1>Hello $name</h1>

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

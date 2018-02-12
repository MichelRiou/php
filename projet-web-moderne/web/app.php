<?php

use m2i\framework\Router as MyRouter;

define("ROOT_PATH",dirname(__DIR__));     // dirname donne le dossier Parent donc web --> projet-web-moderne
require ROOT_PATH."/vendor/autoload.php";       // Autochargement pour toutes les classes référencées dans composer.json.

// $router=new \m2i\framework\Router("/hello"); grace à l'instruction use
$router=new MyRouter("/hello");
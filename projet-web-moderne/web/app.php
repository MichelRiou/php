<?php

use m2i\framework\Router as MyRouter;
use m2i\framework\Dispatcher;

define("ROOT_PATH", dirname(__DIR__));     // dirname donne le dossier Parent donc web --> projet-web-moderne
require ROOT_PATH . "/vendor/autoload.php";       // Autochargement pour toutes les classes référencées dans composer.json.

// La variable path est issue du rewrite d'url via .htaccess
$url=filter_input(INPUT_GET,"path");

// $router=new \m2i\framework\Router("/hello"); grâce à l'instruction use

$router = new MyRouter($url);
//var_dump($router);
$dispatcher=new Dispatcher($router,"m2i\\monAppli\\Controllers\\");
$dispatcher->dispatch();
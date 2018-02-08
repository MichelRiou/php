<?php
// Demarrage de la session
session_start();
// Définition du chemin racine de l'appli.
define('ROOT_PATH', dirname(__DIR__));
// Mise en place de l'auto-chargement des classes
function autoloader($class)
{
    $classPath = ROOT_PATH . "/src/classes/${class}.php";   // ${..} limitation de l'interpolation.
    if (file_exists($classPath)) {
        include_once $classPath;
    } else {
        throw new Exception("Classe inexsistante");
    }
}

// Référencement de la fonction d'autochargement
spl_autoload_register("autoloader");
// Instanciation du logger
$logWriter = new FileLogWriter(ROOT_PATH . "/logs/log.txt");
$logger = new Log($logWriter); //Injection de dépendance Log a besoin d'un LogWriter

// Gestion d'une route
$route = filter_input(INPUT_GET, "r", FILTER_SANITIZE_URL)??"homePage";  // ?? retourne le premier element non nul
// Gestion d'un utilisateur
if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
} else if ($route != "inscription") {
    header("location:index.php?r=inscription");
    return;
}
$controllerPath = ROOT_PATH . "/src/controllers/${route}.php";
if (file_exists($controllerPath)) {
// Inclusion de la route
    include $controllerPath;
} else {
    //throw new Exception("Erreur 404");
    include ROOT_PATH . "/src/controllers/404.html";
}



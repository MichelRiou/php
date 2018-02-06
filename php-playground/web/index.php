<?php
// Importation de la class User
require "../src/user.php";

// Instanciation d'un utilisateur

$user= new user("toto@mail.fr","ZT40","michel");

echo "Hello ".$user->getUser()."<br>";
echo "SHA1 ".$user->getPassword();
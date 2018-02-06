<?php
// session_start definie dans index.php
// Importation des class
//require "../src/user.php";
// Si c'est POST alors le formulaire à été POSTE autrement c'est GET
//var_dump($_POST);
// Récupération méthode d'affichage de la page
$isPosted = filter_has_var(INPUT_POST, "submit");
// Traitement du formulaire si les données ont été postées.
if ($isPosted) {
// Récupération de la saisie
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
// Validation de la saisie
    $isFormValid = $userName && $email && $password;
// Instanciation de l'utilisateur
    if ($isFormValid) {
        $user = new user($email, $password, $userName);
        var_dump($user);
        var_dump(serialize($user));
        // Stockage de l'utilisateur dans une session
        $_SESSION["user"] = serialize($user);   // Impossible de stocker un objet donc serialization vers string Json
    }

// Redirection vers une autre page
    header("location:index.php");
}
?>
<!DOCTYPE>
<html>
<head>
</head>
<body>
<form method="post">
    <div>
        <label>Nom</label>
        <input type="text" name="userName">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <button type="submit" name="submit">Valider</button>
    </div>
</form>
</body>
</html>
<?php
session_start();
require_once 'functions.php';


if (isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = authUser($username, $password);
    
    if ($user){
        $_SESSION['loggedUser'] = $username;
        $_SESSION['message'] = "Félicitations ! Vous vous êtes bien connecté.";

        header("Location: /twitter/list.php");
    }
    else {
        echo "Identifiant ou mot de passe incorrect";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>
    <?php include 'include/header.php' ?>
    
    <h1>Connexion</h1>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Username">

        <input type="password" name="password" placeholder="Password">

        <button type="submit">Me Connecter</button>

    </form>

    <?php include 'include/footer.php' ?>
</body>

</html>
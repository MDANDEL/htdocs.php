<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authUser($username, $password);

    if ($user) {
        $_SESSION['loggedUser'] = $username;
        $_SESSION['message'] = "Félicitation ! Vous êtes bien connecté !";
        header("Location: /amazon/list.php");
    }
    else {
        echo "Identifiant ou mot passe incorrect :(";
    }
}

require_once 'views/login.php';
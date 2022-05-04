<?php

require_once 'functions.php';

if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']){
    $message = $_POST['message'];
    $username = $_SESSION['loggedUse'];

    createTweet($message, $username);

}

header("Location: /twitter/list.php");
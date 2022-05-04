<?php

session_start();

require_once 'functions.php';

if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']){
    $message = $_POST['message'];
    $username = $_SESSION['loggedUser'];

    createTweet($message, $username);

}

header("Location: /twitter/list.php");
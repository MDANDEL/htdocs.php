<?php

session_start();

require_once 'functions.php';

if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']){
    $id = $_GET['id'];
    $username = $_SESSION['loggedUser'];

    deleteTweet($id, $username);
}

header("Location: /twitter/list.php");
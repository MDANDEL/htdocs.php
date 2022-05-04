<?php

session_start();


require_once 'functions.php';

$id = $_GET['id'];

likeTweet($id);
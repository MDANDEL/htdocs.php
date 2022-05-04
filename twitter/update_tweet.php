<?php

session_start();
require_once 'functions.php';

$tweet = getTweet($_GET['id']);
$username = $_SESSION['loggedUser'];


if ($username !== $tweet->user->username){
    $_SESSION['message'] = "Vous ne pouvez pas modifier ce tweet";
    header('Location: /twitter/list.php');
}


if (isset($_POST) && isset($_POST['message'])){
    $message = $_POST['message'];
    updateTweet($tweet->id, $message, $username);
    header('Location: /twitter/list.php');
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feed Twitter</title>
</head>

<body>

    <?php include 'include/header.php' ?>

    <h1>Modifier Mon tweet</h1>
   <form action="" method="post">
        <label for="message">Mon Message</label>
       <textarea name="message" id="message">
           <?php echo $tweet->getMessage() ?>
       </textarea>

        <button type="submit">Modifier</button>

   </form>

   <?php include 'include/footer.php' ?>
</body>

</html>
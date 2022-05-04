<?php

session_start();
require_once 'functions.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feed Twitter</title>
</head>

<body>
    <?php include 'include/header.php' ?>
    <?php include 'include/notify.php' ?>

    <h1>Twitter</h1>

    <?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']) : ?>
        <form action="/twitter/create_submit.php" method="post">
            <label for="message">Mon message</label>
            <textarea name="message" id="message"></textarea>

            <button type="submit">Envoyer mon tweet</button>
        </form>
    <?php endif; ?>


    <?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']) : ?>

        <p>
            Bonjour <?php echo $_SESSION['loggedUser']; ?>
        </p>

        <section>
            <?php foreach (getTweets() as $tweet) : ?>
                <?php /** @var $tweet Tweet */ ?>
                <article>
                    <p><?php echo nl2br(htmlspecialchars($tweet->getMessage()))?></p>
                    <span><?php echo $tweet->user->screenName ?><br /></span>
                    <span><?php echo $tweet->like ?><br /></span>
                    <a href="/twitter/delete_tweet.php?id=<?php echo $tweet->id?>">Supprimer</a>
                    <a href="/twitter/update_tweet.php?id=<?php echo $tweet->id?>">Modifier</a>
                </article>
                <hr />
            <?php endforeach; ?>
        </section>

        <?php include 'include/footer.php' ?>
    <?php endif; ?> 

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nous Contacter</title>
</head>

<body>
    <?php include 'include/header.php' ?>

    <form method="post" action="/twitter/contact_submit.php" enctype="multipart/form-data">
        <label for="email">Email</label>
        <input type="text" name="email"/>
        <br/>

        <label for="message">Message</label>
        <textarea placeholder="Votre message ..." name="message" id="message"></textarea>
        <br/>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" maxlength="2"/>
        <br/>

        <button type="submit">Envoyer</button>
    </form>

    <?php include 'include/footer.php' ?>
</body>
</html>
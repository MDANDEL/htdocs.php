<?php include 'include/header.php' ?>
<head>
    <meta charset="UTF-8">
    <title>S'enregistrer</title>
</head>

<body>
    
    
    <h1>S'enregistrer</h1>

    <form action="/register" method="post">
        <input type="text" name="username" placeholder="Username">

        <input type="text" name="email" placeholder="email">

        <input type="text" name="emailcheck" placeholder="Vérifier votre email">

        <input type="password" name="password" placeholder="Password">

        <input type="password" name="passwordcheck" placeholder="Entrez de nouveau votre Password">

    <button type="submit">S'enregistrer</button>

    </form>

    
</body>
<?php include 'include/footer.php' ?>
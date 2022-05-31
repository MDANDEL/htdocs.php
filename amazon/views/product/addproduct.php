<?php include 'views/include/header.php' ?>

<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
</head>

<body>

    <form action="/addproduct" method="post">
        <label for="create">Ajouter un ou plusieurs produits</label>
        <input type="text" name="product" id="product" placeholder="Nom de votre produit">

        <textarea name="description" id="description" placeholder="Description de votre Produit"></textarea>

        <input type="number" name="price" id="price" placeholder="Prix de votre produit">
        <textarea name="category" id="category" placeholder="">Cat</textarea>
        <textarea name="image" id="image" placeholder="">Lien</textarea>


        <button type="submit">Ajouter au catalogue</button>
    </form>

</body>

<?php include 'views/include/footer.php' ?>
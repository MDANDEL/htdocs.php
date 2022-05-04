<?php

// var_dump permet d'afficher une variable (si tableau, les key et values)
// var_dump($_FILES);

if (isset($_FILES['image']) && $_FILES['image']['error']===0){
    $name = $_FILES['image']['name'];

    $extension = $_FILES['image']['type']; 
    $allowedExtensions = ['image/jpg', 'image/png'];

    if (in_array($extension, $allowedExtensions)){
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $name);
    }
    else {
        $error = "Votre fichier n'est pas autorisé";
    }    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Merci de nous avoir contacté</title>
</head>

<body>
    <?php include 'include/header.php' ?>   

    <h1>Merci !</h1>

    <div>
        <h2>Recap de votre demande : </h2>
        <ul>
            <li>
                Email : <?php echo htmlspecialchars($_POST['email']) ?>
            </li>
            <li>
                Message : <?php echo htmlspecialchars( $_POST['message']) ?>
            </li>
            <?php if (isset($error)): ?>    
               <b><?php echo $error; ?></b>
            <else if (isset($name)): ?>    
                <li>
                    Image : <img src="uploads/<?php echo $name?>">
                </li>
            <?php endif; ?>
        </ul>
    </div>
    


    <?php include 'include/footer.php' ?>
</body>

</html>
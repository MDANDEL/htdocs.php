<!DOCTYPE html>
<html>
    <head>
        <title> Page de Test</title>
    </head>

    <body>
        <h1> Ma page Web</h1>

        <p>Coucou, tu veux voir ? </p>

        <?php echo "Je teste le php" ?>
        <p>Nous sommes le <?php echo date("Y-m-d H:i:s") ?></p>


        <?php
        $age = 42; // int
        $nom = "Jean Mich"; // string
        $prix = 15.6; // float
        $viant = true; //boolean
        $vide = null; // null


        $isEnabled = true;
        if ($isEnabled == true){
            echo "Vous pouvez accéder au site ! <br/>"; 
        }

        $isAdmin = true;
        $isOwner = false;
        ?>

        <?php if (($isEnabled && $isOwner) || $isAdmin): ?>
            <p>Autorisé</p>
        <?php else : ?>
            <p>Non Autorisé</p>
        <?php endif; ?>

        <?php
        $grade = 10;
        switch($grade) {
            case 0:
                echo "Ca vaut 0";
                break;
            case 10:
                echo "Ca vaut 10";
                break;
            case 20:
                echo "Ca vaut 20";
                break;
            default:
                echo "Ca vaut autre chose";
        }
        ?>

        <?php
        $isAdmin = ($isEnabled && $isOwner) ? true : false;
        // équivalent à la condition suivante :
        if ($isEnabled && $isOwner){
            $isAdmin = true;
        }
        else {
            $isAdmin = false;
        }

        $user1 = ["Maxime", "maxime@gmail.com"];
        $user2 = ["Jean mich", "jeanmich@gmail.com"];

        echo 'Email de l\'utilsateur 1 : ' . $user1[1] . '<br/>';

        $users = [$user1, $user2];

        echo 'Email de l\'utilsateur 1 : ' . $users[0][1] . '<br/>';

        // permet d'afficher les valeurs d'un tableau
        print_r($users);
        echo '<br/>';
        var_dump($users);

        echo '<br/>';

        $recipes = [];
        $recipes[0] = 'pates';
        $recipes[1] = 'pesto';
        // ajoute en dernier élément du tableau
        $recipes[] = 'saucisson';
        // on peut nommer la clef, plutot que se référer à l'index
        $recipes['Apéro'] = 'Bière';
        echo '<br/>';
        print_r($recipes);
        
        echo '<br/>';
        $texte = 'Hello';
        $texte .= ' Jean Mi';
        echo $texte;

        echo '<br/>';


        $lines = 1;
        while($lines <= 20){
            echo "C'est valide <br/>";
            $lines ++;

        }

        
        ?>
    </body>

</html>
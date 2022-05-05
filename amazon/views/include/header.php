<!DOCTYPE html>
<html lang="fr">


<nav>
    <ul>
        <li>
            <a href="/twitter/list.php">Liste des tweets</a>
        </li>
        <li>
            <a href="/twitter/contact.php">Nous Contacter </a>
        </li>
        <?php if (!(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser'])): ?>
            <li>
                <a href="/twitter/login.php">Connexion</a>
            </li>
        <?php endif; ?>


        <?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']): ?>
            <li>
                <a href="/twitter/logout.php">Déconnexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
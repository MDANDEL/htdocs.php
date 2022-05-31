<nav>
    <ul>
        <li>
            <a href="/blog/list.php">Liste des Items</a>
        </li>
        <li>
            <a href="/blog/contact.php">Nous Contacter </a>
        </li>
        <?php if (!(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser'])): ?>
            <li>
                <a href="/blog/login.php">Connexion</a>
            </li>
        <?php endif; ?>


        <?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']): ?>
            <li>
                <a href="/blog/logout.php">Déconnexion</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
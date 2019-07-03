<nav>
    <div id="alignDisplayMenu">
        <i class="fas fa-bars" id="displayMenu"></i>
        <i id="closeBouton" class="fas fa-times"></i>
    </div>
    <img id="logo" alt="" src="./assets/img/logobis.png">
    <ul>
        <li><a href="index.php?page=index">Accueil</a></li>
        <li><a href="index.php?page=informations">Informations</a></li>
        <li><a href="index.php?page=events">Evenement</a></li>
        <li><a href="index.php?page=contact">Contact / Signaler</a></li>
        <?php if (empty($_SESSION)): ?>
            <li>
            <a href="index.php?page=login">Connexion</a>
            </li>
            <?php else:?>
        <?php if ($_SESSION['user']['admin'] == 1):?>
                <li><a href="index.php?page=admin&param=index">Administration</a></li>
                <li>
                    <a href="index.php?page=logout">Deconnexion</a>
                </li>
        <?php else:?>
            <li><a href="index.php?page=account">Mon Compte</a></li>
            <li>
                <a href="index.php?page=logout">Deconnexion</a>
            </li>
        <?php endif;?>
        <?php endif; ?>
    </ul>
</nav>
<div id="navMobile">
    <div id="orderedNav">
        <a href="index.php?page=index">Accueil</a>
        <a href="index.php?page=informations">Informations</a>
        <a href="index.php?page=events">Evenement</a>
        <a href="index.php?page=contact">Contact / Signaler</a>
        <?php if (empty($_SESSION)): ?>

                <a href="index.php?page=login">Connexion</a>

        <?php else:?>
            <?php if ($_SESSION['user']['admin'] == 1):?>
           <a href="index.php?page=admin&param=index">Administration</a>

                    <a href="index.php?page=logout">Deconnexion</a>

            <?php else:?>
             <a href="index.php?page=account">Mon Compte</a>

                    <a href="index.php?page=logout">Deconnexion</a>

            <?php endif;?>
        <?php endif; ?>
    </div>
</div>

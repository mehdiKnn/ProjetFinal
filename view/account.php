<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/account.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Compte</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
    <div id="container">
        <div id="firstContainer">
            <h2 id="accountTitle">Mon Compte</h2>
            <span id="accountTitle">Prenom : <?= $userInfo['lastname'] ?></span>
            <span id="accountTitle">Nom :  <?= $userInfo['firstname'] ?></span>
            <span id="accountTitle">Date de naissance :  <?= $userInfo['birthdate'] ?></span>
            <span id="accountTitle">Adresse :  <?= $userInfo['adresse'] ?></span>
            <span id="accountTitle">Numéro de téléphone :  <?= $userInfo['phone_number'] ?></span>
            <span id="accountTitle">Mail :  <?= $userInfo['mail'] ?></span>
        </div>
            <div id="firstContainer">
                <?php var_dump($fees)?>
                <?php foreach ($fees as $fee):?>
                    <div id="facture">
                        <div id="subFacture">
                            <span><?= $fee['name'] ?></span>
                            <span>Statut  : impayée</span>
                        </div>
                        <div id="subFacture">
                            <span><?= $fee['date'] ?></span>
                            <span><?= $fee['amount'] ?></span>
                        </div>
                        <div id="subFacture">
                            <span><a href="./assets/facture/<?= $fee['file']; ?>">Visionner</a></span>
                            <span><a href="./assets/facture/<?= $fee['file']; ?>" download>Télécharger</a></span>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
    </div>

</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/mobileNav.js"></script>



</body>
</html>



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
            <span id="accountTitle">Prenom : Mehdi</span>
            <span id="accountTitle">Nom : Kannouni</span>
            <span id="accountTitle">Date de naissance : 20/12/1998</span>
            <span id="accountTitle">Adresse : 22 rue Etienne Marcel</span>
            <span id="accountTitle">Numéro de téléphone : 0658656818</span>
            <span id="accountTitle">Mail : mehdi.kannouni@hotmail.fr</span>
        </div>
            <div id="firstContainer">
                    <div id="facture">
                        <div id="subFacture">
                            <span>Cantine décembre</span>
                            <span>Statut  : payée</span>
                        </div>
                        <div id="subFacture">
                            <span>20/12/1998</span>
                            <span>120 €</span>
                        </div>
                        <div id="subFacture">
                            <span>Consulter ma facture</span>
                            <span>Telechargé</span>
                        </div>
                    </div>
            </div>
    </div>

</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/mobileNav.js"></script>



</body>
</html>



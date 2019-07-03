<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/loginStyle.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>login</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
    <section id="sectionConnect">
        <form action="?page=login" method="post" class="formConnexion">
            <div class="lastTouch">
                <label id="labelLogin">Login</label>
                <input id="inputLogin" type="text" name="lastname">
            </div>
            <div class="lastTouch">
                <label id="labelMdp">Mot de passe</label>
                <input id="inputMdp" type="password" name="password">
            </div>
            <button class="boutonConnexion" type="submit" name="login">Valider</button>
            <a href="#" class="lostPwd"><small>mot de passe oublié ?</small></a>
        </form>
    </section>
</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/main.js"></script>
</body>
</html>



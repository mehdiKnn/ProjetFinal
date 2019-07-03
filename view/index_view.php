<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/styleIndex.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
        <div id="container">
            <h1 id="titleIndex">Bienvenue sur le site de la ville de Pantin</h1>
            <h1 id="titleIndexMobile">Accueil</h1>
            <div id="firstContainer">
                <div id="subContainer">
                    <h2 id="indexTitle">Nos dernieres evenements et actualites</h2>
                    <div class="containerUp">
                        <div id="upLeft">
                            <div id="containerImg">
                                <img id="sideImage" alt="#" src="./assets/img/colonie.jpg">
                                <span id="overlayImg">Vacances</span>
                            </div>

                            <div id="subUpLeft">
                                <h3>Colonies à la mer !</h3>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam corporis dolores, eos et excepturi fuga, in ipsum iure libero necessitatibus nesciunt, nostrum pariatur perferendis possimus quasi quod rerum veritatis!</span>
                            </div>
                        </div>
                        <hr id="mobileHr">
                        <div id="upRight">
                            <div id="subUpRight">
                                <h3>Devenir mediateur !</h3>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque exercitationem mollitia nam nihil quia. Aspernatur commodi labore maiores odio praesentium? Accusantium harum hic impedit incidunt pariatur porro sapiente, vel voluptatem!</span>
                            </div>
                            <div id="containerImg">
                                <img id="sideImage" alt="#" src="./assets/img/mediateur.jpg">
                                <span id="overlayImg">Emplois</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="botContainer">
                        <?php foreach ($articlesIndex    as $article): ?>
                        <div class="evenementIndex">
                            <h2><?php echo $article['name']?></h2>
                            <span><?php echo $article['summary']?></span>
                            <span id="date"><?php echo $article['date']?></span>
                            <span class="overlayEvenement">Voir plus</span>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/main.js"></script>
</body>
</html>

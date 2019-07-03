<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/eventStyle.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/glider.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Evenements</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
    <div id="container">
        <h2>Presentation de la ville de Pantin</h2>
        <div id="subContainer">
            <div id="leftSub">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusantium consequuntur deserunt dicta dolor exercitationem explicabo labore laudantium maiores molestiae necessitatibus nihil nisi quasi, quis repellendus sed sint temporibus, tenetur?
            </div>
            <div id="rightSub">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cupiditate fugit iusto maxime quisquam voluptate voluptates. Asperiores impedit nisi omnis placeat quo recusandae reiciendis repellat? Maiores omnis recusandae ullam voluptatum?
            </div>
        </div>
    </div>
</div>
<div id="section">
    <div class="botContainer" id="mobileNone">
        <h2>Nos services</h2>
        <div id="firstSub">
        </div>
    </div>
    <div id="parentMobile" >

    </div>
</div>
<div id="modalCenter">
    <div id="modal">
        <div id="contenu">
            <span id="gmap"></span>
            <div id="allContent">
                <div class="modalInfo"></div>
            </div>
        </div>
        <span id="boutonClose"> (x)</span>
    </div>
</div>
<?php include('./partials/footer.html') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBX74UT4CpoOF-KKXarUjlJsJ-hwjaZ4vY"></script>
<script src="./assets/js/glider.js"></script>
<script src="./assets/js/initGlider.js"></script>
<script src="./assets/js/main.js"></script>



</body>
</html>



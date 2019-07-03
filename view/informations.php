<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/infoStyle.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Informations</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
    <div id="container">
         <div id="containerTop">
             <div id="containerLeft" class="containerCommon">
        <h2>Zoom sur</h2>
        <h3><?php echo $articlesZoom['name']?></h3>
        <span><?php echo $articlesZoom['content']?></span>
    </div>
             <div id="containerRight" class="containerCommon">
                 <hr id="topCut">
        <input id="datepickr" name="pickr" type="date">
    </div>
         </div>
         <div id="containerBot">
            <h2 id="dynaTitle">Les prochains evenements</h2>
        <div id="subContainer">

        </div>
    </div>
        <div id="modalCenter">
            <div id="modal">
                <span id="contenu"></span>
                <span id="boutonClose"> (x)</span>
            </div>
        </div>
    </div>
</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
<script src="./assets/js/datepickr.js"></script>


</body>
</html>



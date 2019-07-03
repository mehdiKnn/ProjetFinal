<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" media="screen" href="./assets/css/signalStyle.css">
    <link rel="stylesheet" media="screen" href="./assets/css/partialsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Signal/Contact</title>
</head>
<body>
<?php include('./partials/nav.php') ?>
<div id="main">
    <div id="faq">
        <span class="collapsible"> Questions fréquentes</span>
        <?php foreach ($categories as $categorie):?>
        <button class="collapsible collHover"><?= $categorie['name']?></button>

        <div class="content">
            <?php foreach ($questions as $question):?>
            <?php if ($categorie['id'] == $question['category']):?>
                <h3><?= $question['question']?></h3>
                <p><?= $question['answer']?></p>
            <?php endif;?>
            <?php endforeach;?>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div id="section">
    <section id="sectionContact">
        <form class="formContact" class="formConnexion">
            <h2>Signaler</h2>
            <div id="allSelect">
                <select id="selectCat">
                    <option> Voirie </option>
                    <option> Signalisation </option>
                    <option> Espaces verts </option>
                    <option> Propreté </option>
                    <option> autre </option>
                </select>
                <select id="selectSubCat">
                    <option>--------</option>
                </select>
            </div>
            <div id="allInput">
                <div class="lastTouch">
                    <label id="labelName">Name</label>
                    <input id="inputName" type="text">
                </div>
                <div class="lastTouch">
                    <label id="labelFirst">Firsname</label>
                    <input  id="inputFirst" type="text">
                </div>
            </div>
            <textarea id="questionSignal" placeholder="redige votre plainte ici"></textarea>
            <a class="boutonConnexion" id="signal" >Soumettre</a>
        </form>
        <div class="vl"></div>
        <hr>
        <form class="formContact" class="formConnexion">
            <h2>Contacter</h2>
            <div id="allSelect">
                <div id="divSubject" class="lastTouch">
                    <label id="labelSubject">Sujet</label>
                    <input id="inputSubject" type="text">
                </div>
            </div>
            <div id="allInput">
                <div class="lastTouch">
                    <label id="labelNameContact">Name</label>
                    <input id="inputNameContact" type="text">
                </div>
                <div class="lastTouch">
                    <label id="labelFirstContact">Firstname</label>
                    <input  id="inputFirstContact" type="text">
                </div>
            </div>
            <textarea id="questionContact" placeholder="redige votre message ici"></textarea>
            <a class="boutonConnexion" id="contact">Envoyer</a>
        </form>
    </section>
</div>
<?php include('./partials/footer.html') ?>
<script src="./assets/js/main.js"></script>
</body>
</html>



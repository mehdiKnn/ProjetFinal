<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administration</title>
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/shop-homepage.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Interface administrateur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=logout">Deconnexion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="pb-4 d-flex justify-content-between"><h4>Mehdi Kannouni</h4></div>
            <div class="list-group">
                <a href="?page=admin&param=user_list" class="list-group-item">Utilisateurs</a>
                <a href="?page=admin&param=faq_category_list" class="list-group-item">Catégories FAQ</a>
                <a href="?page=admin&param=fees_list" class="list-group-item">Factures</a>
                <a href="?page=admin&param=faq_list" class="list-group-item">FAQ</a>
                <a href="?page=admin&param=services_list" class="list-group-item">Services</a>
                <a href="?page=admin&param=event_list" class="list-group-item">Evenements</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->
        <section class="col-9">
            <?php if (isset($error)): ?>
                <div class="bg-danger text-white">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <form action="?page=admin&param=event_form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input class="form-control" value="<?php if (isset($_GET['event_id'])) {
                        echo $eventInfo['name'];
                    } ?>" type="text" placeholder="name" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="date">Date : </label>
                    <input class="form-control" value="<?php if (isset($_GET['event_id'])) {
                        echo $eventInfo['date'];
                    } ?>" type="date" placeholder="Nom de famille" name="date" id="date">
                </div>
                <div class="form-group">
                    <label for="content">Content :</label>
                    <textarea class="form-control" rows="6" name="content" id="content"
                              placeholder="Contenu"><?php if (isset($eventInfo)): ?><?= htmlentities($eventInfo['content']); ?><?php endif; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="published"> Publié ?</label>
                    <select class="form-control" name="published" id="published">
                        <option value="0"
                                <?php if (isset($eventInfo) && $eventInfo['published'] == 0): ?>selected<?php endif; ?>>
                            Non
                        </option>
                        <option value="1"
                                <?php if (isset($eventInfo) && $eventInfo['published'] == 1): ?>selected<?php endif; ?>>
                            Oui
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="summary">summary :</label>
                    <textarea class="form-control" type="text" placeholder="résumé" rows="3" name="summary" id="summary"><?php if (isset($eventInfo)): ?><?= htmlentities($eventInfo['content']); ?><?php endif; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tonpere">Image :</label>
                    <input class="form-control" type="file" name="tonpere" id="tonpere"/>
                    <?php if(isset($eventInfo) && $eventInfo['image']): ?>
                        <img class="img-fluid py-4" src="./assets/img/event/<?= $eventInfo['image']; ?>" alt="" />
                        <input type="hidden" name="current-image" value="<?= $eventInfo['image']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <!-- Si $user existe, on affiche un lien de mise à jour -->
                    <?php if (isset($_GET['event_id'])): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour">
                    <?php else: ?>
                        <!-- Sinon on afficher un lien d'enregistrement d'un nouvel utilisateur -->
                        <input class="btn btn-success" type="submit" name="register" value="Enregistrer">
                    <?php endif; ?>
                </div>
                <!-- Si $user existe, on ajoute un champ caché contenant l'id de l'utilisateur à modifier pour la requête UPDATE -->
                <input type="hidden" name="id" value="<?php if (isset($_GET['event_id'])) {
                    echo $eventInfo['id'];
                } ?>">

            </form>
        </section>
    </div>
</div>

<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>

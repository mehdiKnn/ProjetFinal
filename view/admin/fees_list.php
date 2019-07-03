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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="pb-4 d-flex justify-content-between">
                <h4>Liste des Factures</h4>
                <a class="btn btn-primary" href="?page=admin&param=fees_form">Ajouter une Facture</a>
            </div>
            <?php if(isset($_GET['action'])):?>
                <div class="bg-success text-white p-2 mb-4">Suppression efféctuée.</div>
            <?php endif;?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>date</th>
                    <th>Somme</th>
                    <th>User</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($feesList as $fees): ?>
                    <tr>
                        <th><?php echo $fees['id']?></th>
                        <td><?php echo $fees['name']?></td>
                        <td><?php echo $fees['date']?></td>
                        <td><?php echo $fees['amount']?></td>
                        <td><?php echo $fees['mail']?></td>
                        <td>
                            <a href="?page=admin&param=fees_form&fees_id=<?php echo $fees['id']?>" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="?page=admin&param=fees_list&fees_id=<?php echo $fees['id']?>&amp;action=delete" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>

<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>

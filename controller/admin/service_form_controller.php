<?php

require_once ('./model/services_model.php');

$categories = getServiceCategorie();


if (isset($_POST['register'])){
    $error = addService($_POST['name'], $_POST['categorie'],$_POST['lat'],$_POST['longi'],$_POST['schedule'],$_POST['address']);
}

if (isset($_GET['service_id'])){
    $serviceInfo=getServices($_GET['service_id']);
}

if (isset($_POST['update'])){
    $error = updateService($_POST['id'],$_POST['name'], $_POST['categorie'],$_POST['lat'],$_POST['longi'],$_POST['schedule'],$_POST['address']);
}



require_once('./view/admin/service_form.php');

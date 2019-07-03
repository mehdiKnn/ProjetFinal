<?php

require_once ('./model/fees_model.php');
require_once ('./model/user_model.php');


if (isset($_POST['register'])){
    $error = addFees($_POST['name'],$_POST['date'],$_POST['amount'],$_FILES['fee']['name'],$_FILES['fee']['tmp_name'],$_POST['user']);
}

if (isset($_GET['fees_id'])){
    $feesInfo = getFees($_GET['fees_id']);
}

if (isset($_POST['update'])){
    $error = updateFees($_POST['id'],$_POST['name'],$_POST['date'],$_POST['amount'],$_POST['user'],$_FILES['fee']['name'],$_FILES['fee']['tmp_name']);
}

$userList = getUser();


require_once('./view/admin/fees_form.php');

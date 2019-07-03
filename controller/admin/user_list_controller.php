<?php


require_once ('./model/user_model.php');

if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    $message = deleteUser($_GET['user_id']);
}

$user = getUser();



require_once('./view/admin/user_list.php');
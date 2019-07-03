<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 20:59
 */


require_once ('./model/user_model.php');

if (isset($_POST['register'])){
    $error = addUser($_POST['lastname'], $_POST['firstname'],$_POST['password'],$_POST['birthdate'],$_POST['adresse'],$_POST['email'],$_POST['phone_number']);
}

if (isset($_GET['user_id'])){
    $userInfo=getUser($_GET['user_id']);
}

if (isset($_POST['update'])){
    $error = updateUser($_POST['lastname'], $_POST['firstname'],$_POST['password'],$_POST['birthdate'],$_POST['adresse'],$_POST['email'],$_POST['phone_number'], $_POST['id']);
}


require_once('./view/admin/user_form.php');
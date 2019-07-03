<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 22/05/2019
 * Time: 20:33
 */

require_once ('./model/login_model.php');

if(isset($_SESSION['user'])){
    header('location: index.php');
}

if (isset($_POST['login'])){
    login( $_POST['password'], $_POST['lastname']);
}

require_once ('./view/login.php');
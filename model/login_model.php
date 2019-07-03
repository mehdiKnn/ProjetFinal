<?php
require_once('./model/tools.php');

function login($mdp, $lastname){

    $db = dbConnect();

    $query_user = $db->prepare('SELECT * FROM user WHERE lastname = ? AND password = ?');
    $query_user->execute(array($lastname, $mdp));
    $result_user = $query_user->fetch();

    if ($result_user != false) {
        $_SESSION['user'] = $result_user;
        header('location: index.php');
    }

}

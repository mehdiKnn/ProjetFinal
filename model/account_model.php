<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 03/07/2019
 * Time: 04:53
 */
require_once('./model/tools.php');

function getUserInfo($id){
    $db = dbConnect();
    $query_service = $db->prepare('SELECT * FROM user WHERE id = ?');
    $query_service->execute(array($id));
    return $result =$query_service->fetch();
}

function getFees($id){
    $db = dbConnect();
    $query_service = $db->prepare('SELECT * from fees WHERE fees.user = ?');
    $query_service->execute(array($id));
    return $result =$query_service->fetchAll();
}
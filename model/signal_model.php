<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 03/07/2019
 * Time: 01:04
 */

require_once('./model/tools.php');

function getFaq(){
    $db = dbConnect();

    $query = $db->query('SELECT * from faq_category');
    return $result = $query->fetchAll();

}

function getQuestion(){
    $db = dbConnect();
    $query = $db->query('SELECT * from faq');
    return $result = $query->fetchAll();
}
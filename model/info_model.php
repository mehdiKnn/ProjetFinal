<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 28/05/2019
 * Time: 16:08
 */

require_once('./model/tools.php');

function getArticle(){
    $db = dbConnect();
    $query_article = $db->prepare('SELECT * from event GROUP BY event.id ORDER BY date DESC LIMIT 3 ;');
    $query_article->execute();
    return $query_article->fetchAll();
}

function getRandomArticle(){
    $db = dbConnect();
    $getRow = $db->query('SELECT COUNT(id) from event WHERE published = 1')->fetch();
    $random =  rand(1 , $getRow['0']);

    $query_article = $db->prepare('SELECT * from event WHERE id= ?;');
    $query_article->execute(array($random));
    $article = $query_article->fetch();
    return $article;
}
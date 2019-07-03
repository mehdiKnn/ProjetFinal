<?php

require_once '../../model/tools.php';
$db = dbConnect();

$query_article = $db->prepare('SELECT * from services_cat;');
$query_article->execute();
echo json_encode($query_article->fetchAll());
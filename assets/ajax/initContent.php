<?php

require_once '../../model/tools.php';
$db = dbConnect();

$query_article = $db->prepare('SELECT * from event WHERE published =1 GROUP BY event.id ORDER BY date DESC LIMIT 3 ;');
$query_article->execute();
echo json_encode($query_article->fetchAll());
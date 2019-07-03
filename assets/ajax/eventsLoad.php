<?php
require_once '../../model/tools.php';
header("Access-Control-Allow-Origin: *");

$db = dbConnect();

$date = $_POST['date'];
$query_events = $db->prepare('SELECT * FROM event WHERE date = ? ');
$query_events->execute(array($date));
echo json_encode($query_events->fetchAll());



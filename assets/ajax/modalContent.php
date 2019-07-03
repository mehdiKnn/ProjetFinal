<?php
require_once '../../model/tools.php';
header("Access-Control-Allow-Origin: *");

$db = dbConnect();

$id = $_POST['id'];
$query_events = $db->prepare('SELECT event.content , event_media.name, event.name as title FROM event INNER JOIN event_media ON event.id = event_media.event_id  WHERE event.id = ? ');
$query_events->execute(array($id));
echo json_encode($query_events->fetch());



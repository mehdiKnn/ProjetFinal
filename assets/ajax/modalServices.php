<?php
require_once '../../model/tools.php';
header("Access-Control-Allow-Origin: *");

$db = dbConnect();

$id = $_POST['id'];
$query_events = $db->prepare('SELECT services.name, lat, longi, schedule, address FROM services INNER JOIN services_cat sc on services.categorie = sc.id WHERE sc.id =? ');
$query_events->execute(array($id));
echo json_encode($query_events->fetchAll());



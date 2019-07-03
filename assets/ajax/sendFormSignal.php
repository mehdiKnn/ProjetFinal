<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 03/07/2019
 * Time: 01:52
 */
require_once '../../model/tools.php';
header("Access-Control-Allow-Origin: *");
$db = dbConnect();

$to = "mehdi.kannouni@hotmail.fr";
$subject = $_POST['categorie'].$_POST['subcategorie'];
$txt = $_POST['content'];
$headers = "From: ".$_POST['name'].$_POST['firstname'];
mail($to,$subject,$txt,$headers);

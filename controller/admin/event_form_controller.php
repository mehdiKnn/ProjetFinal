<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 25/06/2019
 * Time: 20:59
 */


require_once ('./model/events_model.php');

if (isset($_POST['register'])) {
    $error = addEvent($_POST['name'], $_POST['date'], $_POST['content'], $_POST['published'], $_POST['summary'],$_FILES['tonpere']['name'],$_FILES['tonpere']['tmp_name']);

}

if (isset($_GET['event_id'])){
    $eventInfo=getEvents($_GET['event_id']);
}

if (isset($_POST['update'])){
 $error = updateEvent($_POST['id'],$_POST['name'], $_POST['date'], $_POST['content'], $_POST['published'], $_POST['summary'],$_FILES['tonpere']['name'],$_FILES['tonpere']['tmp_name'] );
}

require_once('./view/admin/event_form.php');
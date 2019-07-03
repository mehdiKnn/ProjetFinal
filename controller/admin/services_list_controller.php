<?php

require_once ('./model/services_model.php');


if(isset($_GET['service_id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    $message = deleteServices($_GET['service_id']);
}

$serviceList = getServices();



require_once('./view/admin/services_list.php');
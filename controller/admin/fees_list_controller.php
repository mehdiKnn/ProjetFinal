<?php

require_once ('./model/fees_model.php');


if(isset($_GET['fees_id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    $message = deleteFaqCategory($_GET['fees_id']);
}

$feesList = getFees();



require_once('./view/admin/fees_list.php');
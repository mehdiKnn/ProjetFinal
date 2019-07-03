<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 30/06/2019
 * Time: 16:44
 */

require_once ('./model/faq_model.php');


if(isset($_GET['faq_id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    $message = deleteFaq($_GET['faq_id']);
}

$faqList = getFaq();



require_once('./view/admin/faq_list.php');
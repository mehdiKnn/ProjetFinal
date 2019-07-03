<?php

require_once ('./model/faq_model.php');

$categories = getFaqCategorie();


if (isset($_POST['register'])){
    $error = addFaq($_POST['question'], $_POST['answer'], $_POST['category']);
}

if (isset($_GET['faq_id'])){
    $faqInfo=getFaq($_GET['faq_id']);
}

if (isset($_POST['update'])){
    $error = updateFaq($_POST['id'],$_POST['question'], $_POST['answer'], $_POST['category']);
}



require_once('./view/admin/faq_form.php');

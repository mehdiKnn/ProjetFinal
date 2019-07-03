<?php

require_once ('./model/faq_category_model.php');


if (isset($_POST['register'])){
    $error = addFaqCategory($_POST['name']);
}

if (isset($_GET['faq_category_id'])){
    $faqCategoryInfo = getFaqCategory($_GET['faq_category_id']);
}

if (isset($_POST['update'])){
    $error = updateFaqCategory($_POST['id'],$_POST['name']);
}



require_once('./view/admin/faq_category_form.php');

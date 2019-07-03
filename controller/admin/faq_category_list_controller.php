<?php

require_once ('./model/faq_category_model.php');


if(isset($_GET['faq_category_id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    $message = deleteFaqCategory($_GET['faq_category_id']);
}

$faqCategoryList = getFaqCategory();



require_once('./view/admin/faq_category_list.php');
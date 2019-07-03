<?php

require_once ('./model/account_model.php');

$userInfo = getUserInfo($_SESSION['user']['id']);

$fees = getFees($_SESSION['user']['id']);

require_once('./view/account.php');
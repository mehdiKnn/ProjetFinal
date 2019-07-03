<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 22/05/2019
 * Time: 20:34
 */

require_once ('./model/signal_model.php');


$categories = getFaq();

$questions = getQuestion();

require_once ('./view/signal.php');
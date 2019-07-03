<?php

require_once ('./model/events_model.php');

$eventsList = getEvents();

require_once('./view/admin/events_list.php');
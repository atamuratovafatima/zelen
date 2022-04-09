<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Map.php');

$arr = json_decode($_POST['JSON_data']);
$pers = new Map;
$pers->update($arr);

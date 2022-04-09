<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Losses.php');

$arr = json_decode($_POST['JSON_data']);
$pers = new Losses;
$pers->update($arr);

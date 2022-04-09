<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/CompaniesLeaved.php');

$arr = json_decode($_POST['JSON_data']);
$pers = new CompaniesLeaved;
$pers->update($arr);

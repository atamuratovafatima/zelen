<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/personsNonGrata.php');

$arr = json_decode($_POST['JSON_data']);
$pers = new PersonsNonGrata;
$pers->update($arr);

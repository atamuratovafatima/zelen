<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Currency.php');

$arr = json_decode($_POST['JSON_data']);

$curr = new Currency;
echo json_encode($curr->get());

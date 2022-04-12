<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Currency.php');

$curr = new Currency;
echo json_encode($curr->get());

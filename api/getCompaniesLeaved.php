<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/CompaniesLeaved.php');

$curr = new CompaniesLeaved;
echo json_encode($curr->get());

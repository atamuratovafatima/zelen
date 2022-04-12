<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/personsNonGrata.php');

$curr = new PersonsNonGrata;
echo json_encode($curr->get());

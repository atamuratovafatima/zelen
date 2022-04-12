<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Losses.php');

$curr = new Losses;
echo json_encode($curr->get());

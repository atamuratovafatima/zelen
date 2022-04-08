<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$DB_SERVER =    $_ENV['DB_SERVER'];
$DB_DATABASE =  $_ENV['DB_DATABASE'];
$DB_USER =      $_ENV['DB_USER'];
$DB_PASSWORD =  $_ENV['DB_PASSWORD'];

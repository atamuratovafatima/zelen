<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Map.php');

$map = new Map;
echo json_encode($map->get());

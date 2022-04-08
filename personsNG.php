<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/personsNonGrata.php');

$personsNG = new PersonsNonGrata;
$personsNG_list = $personsNG->get();

for ($i = 0; $i < count($personsNG_list); $i++) {
    echo $personsNG_list[$i]['Name'];
}

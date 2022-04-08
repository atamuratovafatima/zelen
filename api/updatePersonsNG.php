<?php

declare(strict_types=1);
$arr = json_decode($_POST['JSON_data']);

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$DB_SERVER =    $_ENV['DB_SERVER'];
$DB_DATABASE =  $_ENV['DB_DATABASE'];
$DB_USER =      $_ENV['DB_USER'];
$DB_PASSWORD =  $_ENV['DB_PASSWORD'];

try {
    $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();
    $conn->exec("DELETE FROM personsng");
    $stmt = $conn->prepare('INSERT INTO personsng (Name) VALUES (:value)');
    for ($i = 0; $i < count($arr); $i++) {
        $stmt->execute(array('value' => $arr[$i][0]));
    }
    $conn->commit();

    echo "New records created/updated successfully";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null;

<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');

$arr = json_decode($_POST['JSON_data']);

try {
    $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();
    $conn->exec("DELETE FROM personsng");
    $stmt = $conn->prepare('INSERT INTO personsng (Name, Description, Photo) VALUES (:value, :description, :photo)');
    for ($i = 0; $i < count($arr); $i++) {
        $stmt->execute(array('value' => $arr[$i][0], 'description' => $arr[$i][1], 'photo' => $arr[$i][2]));
    }
    $conn->commit();

    echo "New records created/updated successfully";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null;

<?php

declare(strict_types=1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');

$arr = json_decode($_POST['JSON_data']);

try {
    $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();
    $conn->exec("DELETE FROM currency_rate_to_RUB");
    $stmt = $conn->prepare('INSERT INTO currency_rate_to_RUB (currency, feb23, today, diff, diff_percentage) 
                            VALUES (:currency, :feb23, :today, diff, diff_percentage)');
    for ($i = 0; $i < count($arr); $i++) {
        $stmt->execute(array(
            'currency' => $arr[$i][0],
            'feb23' => $arr[$i][1],
            'today' => $arr[$i][2],
            'diff' => $arr[$i][3],
            'diff_percentage' => $arr[$i][4]

        ));
    }
    $conn->commit();

    echo "Currency rate updated successfully";
} catch (PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null;

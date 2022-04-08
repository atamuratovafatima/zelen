<?php
class Currency
{
    private $conn;

    function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
        $this->conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get()
    {
        $stmt =  $this->conn->prepare("SELECT * FROM currency_rate_to_RUB");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($arr)
    {
        try {
            $this->conn->beginTransaction();
            $this->conn->exec("DELETE FROM currency_rate_to_RUB");
            $stmt = $this->conn->prepare('INSERT INTO currency_rate_to_RUB (currency, feb23, today, diff, diff_percentage) 
                                VALUES (:currency, :feb23, :today, :diff, :diff_percentage)');
            for ($i = 0; $i < count($arr); $i++) {
                $stmt->execute(array(
                    'currency' => $arr[$i][0],
                    'feb23' => $arr[$i][1],
                    'today' => $arr[$i][2],
                    'diff' => $arr[$i][3],
                    'diff_percentage' => $arr[$i][4]
                ));
            }
            $this->conn->commit();
            echo "Currency rate updated successfully";
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

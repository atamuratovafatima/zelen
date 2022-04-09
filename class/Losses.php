<?php
class Losses
{
    private $conn;

    function __construct()
    {
        require($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
        $this->conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get()
    {
        $stmt =  $this->conn->prepare("SELECT * FROM Losses");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($arr)
    {
        try {
            $this->conn->beginTransaction();
            $this->conn->exec("DELETE FROM Losses");
            $stmt = $this->conn->prepare('
            INSERT INTO Losses (Type, total_ukr_forces, ukr_losses_by_ukr_news, ukr_losses_by_ru_news, total_ru_forces, ru_losses_by_ukr_news, ru_losses_by_ru_news) 
            VALUES (:type, :total_ukr_forces, :ukr_losses_by_ukr_news, :ukr_losses_by_ru_news, :total_ru_forces, :ru_losses_by_ukr_news, :ru_losses_by_ru_news)');
            for ($i = 0; $i < count($arr); $i++) {
                $stmt->execute(array(
                    'type' => $arr[$i][0],
                    'total_ukr_forces' => $arr[$i][1],
                    'ukr_losses_by_ukr_news' => $arr[$i][2],
                    'ukr_losses_by_ru_news' => $arr[$i][3],
                    'total_ru_forces' => $arr[$i][4],
                    'ru_losses_by_ukr_news' => $arr[$i][5],
                    'ru_losses_by_ru_news' => $arr[$i][6],
                ));
            }
            $this->conn->commit();

            echo "Losses updated successfully";
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

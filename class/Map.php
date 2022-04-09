<?php
class Map
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
        $stmt =  $this->conn->prepare("SELECT * FROM Map");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($arr)
    {
        try {
            $this->conn->beginTransaction();
            $this->conn->exec("DELETE FROM Map");
            $stmt = $this->conn->prepare('
            INSERT INTO Map (Country_code, Country, Air_space, Sactions, no_Entry_visa, position_to_ru) 
            VALUES (:Country_code, :Country, :Air_space, :Sactions, :no_Entry_visa, :position_to_ru)');
            for ($i = 0; $i < count($arr); $i++) {
                $stmt->execute(array(
                    'Country_code' => $arr[$i][0],
                    'Country' => $arr[$i][1],
                    'Air_space' => $arr[$i][2],
                    'Sactions' => $arr[$i][3],
                    'no_Entry_visa' => $arr[$i][4],
                    'position_to_ru' => $arr[$i][5],
                ));
            }
            $this->conn->commit();

            echo "Map updated successfully";
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

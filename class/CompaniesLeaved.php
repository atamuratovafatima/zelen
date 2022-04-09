<?php
class CompaniesLeaved
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
        $stmt =  $this->conn->prepare("SELECT * FROM CompaniesLeaved");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($arr)
    {
        try {

            $this->conn->beginTransaction();
            $this->conn->exec("DELETE FROM CompaniesLeaved");
            $stmt = $this->conn->prepare('INSERT INTO CompaniesLeaved (CompanyName, Logo) VALUES (:companyName, :logo)');
            for ($i = 0; $i < count($arr); $i++) {
                $stmt->execute(array('companyName' => $arr[$i][0], 'logo' => $arr[$i][1]));
            }
            $this->conn->commit();

            echo "Leaved companies updated successfully";
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

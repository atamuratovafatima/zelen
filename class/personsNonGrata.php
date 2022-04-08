<?php
class PersonsNonGrata
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
        $stmt =  $this->conn->prepare("SELECT * FROM personsng");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($arr)
    {
        try {

            $this->conn->beginTransaction();
            $this->conn->exec("DELETE FROM personsng");
            $stmt = $this->conn->prepare('INSERT INTO personsng (Name, Description, Photo) VALUES (:value, :description, :photo)');
            for ($i = 0; $i < count($arr); $i++) {
                $stmt->execute(array('value' => $arr[$i][0], 'description' => $arr[$i][1], 'photo' => $arr[$i][2]));
            }
            $this->conn->commit();

            echo "New records created/updated successfully";
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

<?php
class PersonsNonGrata
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
        $stmt =  $this->conn->prepare("SELECT * FROM personsng");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}




$conn = null;

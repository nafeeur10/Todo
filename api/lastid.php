<?php
include ("../db.php");

class LastID {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function fetchLastId() {
        $sql = "SELECT id FROM todo ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($this->connection_string, $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$todo = new LastID;

if($todo->fetchLastId())
    echo json_encode($todo->fetchLastId());
else
    echo "0";
?>
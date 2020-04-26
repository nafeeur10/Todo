<?php
include ("../db.php");

class Complete {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function getCompleteList() {
        $sql = "SELECT * FROM todo WHERE todo_status = 1";
        $result = mysqli_query($this->connection_string, $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$todo = new Complete;
echo json_encode($todo->getCompleteList());

?>
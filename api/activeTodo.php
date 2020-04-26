<?php
include ("../db.php");

class ActiveTodo {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function getActiveList() {
        $sql = "SELECT * FROM todo WHERE todo_status = 0";
        $result = mysqli_query($this->connection_string, $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$todo = new ActiveTodo;
echo json_encode($todo->getActiveList());

?>
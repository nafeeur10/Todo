<?php
include ("../db.php");

class Clear {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function clear() {
        $sql = "DELETE FROM todo WHERE todo_status = 1";
        $result = mysqli_query($this->connection_string, $sql);
        if($result) {
            echo "Delete Successfull";
        }
        else {
            echo "May be some problme in your query!";
        }
    }
}

$todo = new Clear;
$todo->clear();

?>
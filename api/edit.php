<?php
include ("../db.php");

class Edit {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function Edit() {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $sql = "UPDATE todo SET edit = 1 WHERE id = " .$id;
            $result = mysqli_query($this->connection_string, $sql);
        }
       
    }
}

$todo = new Edit;
$todo->Edit();

?>
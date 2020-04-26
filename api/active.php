<?php
include ("../db.php");

class Active {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function Update() {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $status = $_POST['todo_status'];
            $sql = "UPDATE todo SET todo_status = true  WHERE id =  '$id' ";
            $result = mysqli_query($this->connection_string, $sql);
            if($result) {
                echo "Update Successfull";
            }
            else {
                echo "May be some problme in your query!";
            }
        }
       
    }
}

$todo = new Active;
$todo->Update();

?>
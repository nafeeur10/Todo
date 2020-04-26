<?php
include ("../db.php");

class Update {

    private $connection_string ;

    public function __construct() {
        $db = new DataBase();
        $this->connection_string = $db->connect();
    }

    public function Update() {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $sql = "UPDATE todo SET todo_title = '$title', edit = 0  WHERE id =  '$id' ";
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

$todo = new Update;
$todo->Update();

?>
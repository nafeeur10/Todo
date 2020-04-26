<?php
    class Todo {

        private $connection_string ;

        public function __construct() 
        {
            include "../db.php";
            $db = new DataBase;
            $this->connection_string = $db->connect();

            if(!isset($this->connection_string)) {
                die("Connection Failed". ' '. mysqli_error($this->connection_string));
            }
        }

        public function insert() 
        {

            if(isset($_POST['todo_title']))
            {
                $todoTitle = $_POST['todo_title'];
                $todoRealID = $_POST['real_id'];
                $sql = "INSERT into todo (todo_title, todo_status, real_id) VALUES ('$todoTitle', false , '$todoRealID')";
                mysqli_query($this->connection_string, $sql);
            }
            else
            {
               echo "Insertion Failed";
            }
        }

        public function fetchTodo() 
        {
            $sql = "SELECT * FROM todo ";
            $result = mysqli_query($this->connection_string, $sql);
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        }

        public function delete() 
        {
            if(isset($_POST['id'])) 
            {
                $id = $_POST['id'];
                $sql = "DELETE FROM todo WHERE id=".$id;
                $result = mysqli_query($this->connection_string, $sql);
            }
        }
    }

    $todo = new Todo;
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method === 'POST') {
        if(isset($_POST['id']))
        {
            $todo->delete();
        }
        else 
        {
            $todo->insert();
        }
    }
    else if($method === 'GET') {
        echo json_encode($todo->fetchTodo());
    }
?>
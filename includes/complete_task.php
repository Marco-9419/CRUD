<?php 

include "conection.php";

if(isset($_GET['id'])) {
        
    $id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];
    
    $sql = "INSERT INTO task_complete (title, description)
            SELECT title, description 
            FROM task WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // echo "yes";
        
        $_SESSION['message'] = 'Task Complete Successfully';
        $_SESSION['message_type'] = 'success';

        header('Location: index.php');
      } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }
}

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM task WHERE id = $id";
    // $result = mysql_query($conn, $query);

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = 'Task Removed Successfully';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");

      } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }
}


?>
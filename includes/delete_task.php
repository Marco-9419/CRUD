<?php 

    include "conection.php";

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
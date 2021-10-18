<?php 

include "conection.php";


    if(isset($_POST['save_task'])){

        $name = $_POST['name'];
        $description = $_POST['description'];

        // Escribimos nuestra consulta
        // $query = "INSERT INTO tareas(nombre, descripcion) VALUES('$name', '$description')";

      $sql = "INSERT INTO task (title, description) VALUES ('$name','$description')";
      

      if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = 'Task Saved succesfully';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");

      } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }

    

    }
    


?>
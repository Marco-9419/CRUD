<?php 

include "conection.php";


    if(isset($_GET['id'])){
        
        $id = $_GET['id'];

        $sql = "SELECT * FROM task WHERE id = $id";
        
        $result = mysqli_query($conn, $sql);

        // echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
           
        }
    }

    if(isset($_POST['update'])){
        
        print "Si hay";

        $id = $_GET['id'];
        $title = $_POST['title'];    
        $description = $_POST['description'];
        
          $sql = "UPDATE task set title = '$title', description = '$description' WHERE id = '$id'";
        echo $description;

      mysqli_query($conn,$sql);

      $_SESSION['message'] = 'Task Update Successfylly';
      $_SESSION['message_type'] = 'warning';

      header("Location: index.php");

    }

?>

<?php include "header.php"; ?>

<div class="" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega una nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                
                <div class="modal-body">


                    <!-- Aqui se mostrara la ventana para crear Tareas -->
                    <form  action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="container divTask" id="task">

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name ="title" 
                                value ="<?php echo $title; ?>" >
                                  
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label" >Descripcion</label>
                                <input type="textarea" class="form-control" id="inpDescripcion" name = "description"
                               value = "<?php echo $description; ?>" >

                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button class="btn btn-dark" data-bs-dismiss="modal" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>


<?php include("conection.php") ?>
<?php include("header.php") ?>


    <nav class="navbar navbar-dark bg-dark">

        <ul class="nav nav-tabs navegacion container">

            <img src="images/promo-select.PNG" class="imgPromoSelect">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page"
                    id="crear" style="cursor: pointer">Crear</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="taskComplete">Tareas Completadas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="taskIncomplete">Tareas Incompletas</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" style="cursor:pointer">Cerrar Sesion</a>
            </li> -->
        </ul>

    </nav>

    <!-- Crear modal with  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega una nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                
                <div class="modal-body">
                    <!-- Aqui se mostrara la ventana para crear Tareas -->
                    <form method="post" action="save_task.php" >
                    <div class="container divTask" id="task">

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="inpNombre" name = "name" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label" >Descripcion</label>
                                <input type="textarea" class="form-control" id="inpDescripcion" name = "description" required>
                                <!-- <input type="checkbox"> -->
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" data-bs-dismiss="modal" id="createTask" name="save_task">Crear Tarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Aqui se muesrtan las tareas Incompletas -->
    <nav class="container modalFix navIncompletas" id="modalIncompletas">

    <?php if(isset($_SESSION['message'])) {?> 
                <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert" style = "text-align:center">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); }?>

        <h2 class="container" style="width: 100%; text-align: center; background: #dc3545; color:white">Tareas

            Incompletas</h2>
        <table class="table table-dark table-striped styleTable" id="tableTask">

            <tbody class="tableBody" id="tbodyIncompletas">

                <tr class="table-active theader">
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Resultado</td>
                </tr>

                
                <?php 

                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_task)) { ?>

                <form method="post" action="complete_task.php?id=<?php echo $row['id']?>">
                <!-- <form  action="complete_task.php?id=<?php ; ?>" method="POST" > -->
                        <tr>
                            <td>
                                <?php echo $row['title'] ?>
                            </td>

                            <td>
                                <?php echo $row['description'] ?>
                            </td>

                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-primary">Edit</button>

                                <a href="delete_task.php?id=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-danger">Delete</button>

                                <a href="">
                                <button class="btn btn-success" name = 'complete'>Complete</button>

                            </td>
                        </tr>
                    </form>

                <?php } ?>

            </tbody>
        </table>

    </nav>


    <nav class="container modalFix navCompletas" id="modalCompletas" style="display:none;">

    <?php if(isset($_SESSION['message'])) {?> 
                <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert" style = "text-align:center">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); }?>

        <h2 class="container" style="width: 100%; text-align: center; background: #198754; color:white ; ">Tareas Completas
        </h2>

        <table class="table table-dark table-striped styleTable" id="tableTask">

            <tbody class="tableBody" id="tbodyCompletas">

                <tr class="table-active theader">
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Resultado</td>
                </tr>

                    
                <?php 

                    $query = "SELECT * FROM task_complete";
                    $result_task = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_task)) { ?>

                <!-- <form method="post" action="complete_task.php?id=<?php echo $row['id']?>"> -->
                <!-- <form  action="complete_task.php?id=<?php ; ?>" method="POST" > -->
                        <tr>
                            <td>
                                <?php echo $row['title'] ?>
                            </td>

                            <td>
                                <?php echo $row['description'] ?>
                            </td>

                            <td>
                                
                            <h2>Complete</h2>

                            </td>
                        </tr>
                    <!-- </form> -->

                <?php } ?>


            </tbody>
        </table>

    </nav>

<!-- <footer> -->

    <div class="footer bg-dark" >
        <footer class="py-3 my-4" style="
        background: #212529";>
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Marco Hernandez</a></li><br>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">25 años</a></li><br>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Estudia en la Universidad UACM</a></li><br>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ingenieria en Software</a></li>
                <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li> -->
            </ul>
            <p class="text-center text-muted">© 2021 Promo Select</p>
        </footer>
    </div>


<?php include("footer.php"); ?>

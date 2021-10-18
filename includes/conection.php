<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "marko1994";
$dbname = "promo_select";

// Create conection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check conection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    // echo "conexion eeexitosa";
}

?>

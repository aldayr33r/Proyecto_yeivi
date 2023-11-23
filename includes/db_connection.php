<?php
$host = "localhost";  
$user = "root";
$password = "";
$database = "tenis_db";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

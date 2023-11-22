<?php
$host = "192.168.100.64";  
$user = "alda";
$password = "alda12345";
$database = "tennis_db";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

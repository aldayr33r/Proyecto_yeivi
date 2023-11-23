<?php
$host = "192.168.100.68";  
$user = "alda";
$password = "alda12345";
$database = "tenis_db";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

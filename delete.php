<?php
include("includes/db_connection.php");

if (isset($_GET["id"])) {
    // Eliminar el tenis
    $id = $_GET["id"];
    $query = "DELETE FROM tenis WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: inventario.php");
        exit();
    } else {
        echo "Error al eliminar tenis: " . mysqli_error($connection);
    }
} else {
    header("Location: inventario.php");
    exit();
}
?>

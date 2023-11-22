<?php
include("includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de agregar tenis
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $talla = $_POST["talla"];
    $color = $_POST["color"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO tenis (marca, modelo, talla, color, precio) VALUES ('$marca', '$modelo', '$talla', '$color', '$precio')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al agregar tenis: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tenis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Agregar Tenis</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="talla">Talla:</label>
            <input type="text" class="form-control" name="talla" required>
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" name="color" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" name="precio" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

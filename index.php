<?php
include("includes/db_connection.php");

// Obtener datos de la base de datos
$query = "SELECT * FROM tenis";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Tenis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>CRUD de Tenis</h2>
    <a href="create.php" class="btn btn-primary">Agregar Tenis</a>
    <br><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['marca']}</td>";
                echo "<td>{$row['modelo']}</td>";
                echo "<td>{$row['talla']}</td>";
                echo "<td>{$row['color']}</td>";
                echo "<td>{$row['precio']}</td>";
                echo "<td>
                        <a href='update.php?id={$row['id']}' class='btn btn-warning'>Editar</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

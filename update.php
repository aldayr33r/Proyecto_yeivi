<?php
include("includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de editar tenis
    $id = $_POST["id"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $talla = $_POST["talla"];
    $color = $_POST["color"];
    $precio = $_POST["precio"];

    $query = "UPDATE tenis SET marca='$marca', modelo='$modelo', talla='$talla', color='$color', precio='$precio' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al editar tenis: " . mysqli_error($connection);
    }
} elseif (isset($_GET["id"])) {
    // Obtener datos del tenis a editar
    $id = $_GET["id"];
    $query = "SELECT * FROM tenis WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $marca = $row["marca"];
        $modelo = $row["modelo"];
        $talla = $row["talla"];
        $color = $row["color"];
        $precio = $row["precio"];
    } else {
        echo "Error al obtener datos del tenis: " . mysqli_error($connection);
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tenis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Editar Tenis</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" value="<?php echo $marca; ?>" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" name="modelo" value="<?php echo $modelo; ?>" required>
        </div>
        <div class="form-group">
            <label for="talla">Talla:</label>
            <input type="text" class="form-control" name="talla" value="<?php echo $talla; ?>" required>
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" name="color" value="<?php echo $color; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include("includes/db_connection.php");

$sql = "SELECT id, marca, modelo, talla, color, precio, imagen FROM tenis";
$result = mysqli_query($connection, $sql);
$resultado = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Tenis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include("includes/navBar.php");?>
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <?php foreach ($resultado as $row) {?>
        <div class="col">
            <div class="card shadow-sm">
                <?php 
            
                $id=$row['imagen'];
                $img_formats=array('.jpg','.jpeg');
                $imagen="";
                foreach($img_formats as $img_format){
                    $imagen="img/$id/1".$img_format;
                    if (file_exists($imagen)) {
                        break;
                    }
                }
                ?>
                <img src="<?php echo $imagen; ?>">
                <div class="card-header">
                <h6 class="card-title"><?php echo $row['marca']; ?></h6>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['modelo']; ?></h4>
                    <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', ',');?></p>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
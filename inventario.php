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
<?php include("includes/navBar.php");?>
<div class="container">
    <h2>Inventario</h2>
    <div class="container">
        <div class="row">
            <div class="col-5">
		<form class="d-flex"> 
			<label for="">Buscar producto</label>
			<input type="text" class="form-control me-2 light-table-filter" data-table="table_id">
		</form>  
    
        </div>
        <div class="col-5">
        <a href="create.php" class="btn btn-primary">Agregar Tenis</a>
    <br><br>
    </div>
        </div>
    </div> 

    <table class="table table-striped table_id">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    (function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);
</script>
</body>
</html>

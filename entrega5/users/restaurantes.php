<?php include('../templates/header.php');   ?>

<body>
  <div class="col center">
  <div class="row justify-content-center">
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var1 = $_SESSION["login_id"];

  echo "<h1> Mis restaurantes favoritos</h1>";
  
  $query = "SELECT R.id_restaurante, R.nombre, R.direccion, R.telefono, R.descripcion
            FROM restaurantes R, favoritos F
			WHERE F.id_usuario = '$var1' AND R.id_restaurante = F.id_restaurante;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>

  <style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
  </style>
  
  <table class="myTable">
    <tr>
    <th>ID Restaurante</th>
      <th>Nombre</th>
      <th>Dirección</th>
      <th>Telefono</th>
      <th>Descripcion</th>
    </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td></tr>";
    }
    ?>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

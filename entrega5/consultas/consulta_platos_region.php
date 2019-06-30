<?php include('../templates/header.php');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var = $_POST["nombre_region"];
  echo "<h1> Platos en la region $var </h1>";
  // Para no tener problemas con los '
  $var = str_replace("'", "''", $var);
  $query = "SELECT DISTINCT PLA.id_plato, PLA.nombre, PLA.precio, PLA.descripcion FROM restaurantes RE, regiones RA, restaurantes_regiones RE_RA, platos PLA, restaurantes_platos RE_PLA  WHERE RA.nombre='$var' AND RE.id_restaurante = RE_RA.id_restaurante AND RA.id_region = RE_RA.id_region AND RE.id_restaurante = RE_PLA.id_restaurante AND PLA.id_plato = RE_PLA.id_plato ORDER BY PLA.id_plato;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
    <style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
  </style>

  <table class="myTable">
  <th>
    <tr>
      <th>Plato</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripción</th>
    </tr>
</th>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

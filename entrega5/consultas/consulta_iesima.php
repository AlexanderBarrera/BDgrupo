<?php include('../templates/header.php');   ?>

<body>
  <!--
  8. Dado un n´umero i, entrega la i-´esima habitaci´on m´as cara. En caso de empate muestre
  las dos 
  -->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var = $_POST["i"];
  $var = (int)$var;

  echo "<h1> $var th habitación más cara </h1>";

  // Esta query no termina nunca, es la que deberiamos usar

  // $query = "SELECT HAB.id_habitacion, Hab.precio FROM habitaciones HAB WHERE $var=(
  //   Select count(*) from habitaciones HAB2 where HAB2.precio >= HAB.precio
  // );";

  $query = "SELECT foo.id_habitacion, foo.nombre, foo.precio FROM (
    SELECT ROW_NUMBER() OVER (ORDER BY precio DESC) AS rownumber,precio, nombre, id_habitacion 
    FROM habitaciones) 
    AS foo 
    WHERE rownumber = $var;";

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
    <tr>
      <th>Habitación</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td><td>$p[2]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

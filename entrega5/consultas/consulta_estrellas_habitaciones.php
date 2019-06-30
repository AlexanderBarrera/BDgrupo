<?php include('../templates/header.php');   ?>

<body>
  <div class="container">
  <!--   2. Dado un n´umero de estrellas, muestre todas las habitaciones de hoteles con m´as de esa cantidad de estrellas, junto al nombre del hotel en el que est´a-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var = $_POST["estrellas"];
  $var = (int)$var;
  echo "<h1> Habitaciones de hoteles con un mínimo de $var estrellas </h1>";

  $query = "SELECT HA.id_habitacion, HO.nombre FROM hoteles HO, habitaciones HA, hotel_habit HO_HA WHERE HO.estrellas>=$var AND HO.id_hotel = HO_HA.id_hotel and HA.id_habitacion = HO_HA.id_habitacion;";
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
      <th>Hotel</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
  }
  ?>
  </table>
<?php include('../templates/footer.html'); ?>

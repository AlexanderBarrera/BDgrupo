<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  echo "<h1> Habitaciones más reservada por región </h1>";
  
  $query = "SELECT RE.id_region, RE.nombre FROM regiones RE;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
    <style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
  </style>

  <table class="muTable">
    <tr>
      <th>Región</th>
      <th>Habitación más popular</th>
      <th>Hotel</th>
      <th>Veces reservada</th>
    </tr>
  <?php
  foreach ($dataCollected as $r) {
	  $query2 = "SELECT HA.id_habitacion, HO.nombre, (SELECT count(RE_HA.id_habitacion) 
						        FROM  reservas_habit RE_HA,
						        WHERE HA.id_habitacion = RE_HA.id_habitacion) as popular
		   FROM hoteles HO, hotel_habit HO_HA, habitaciones HA, hotel_region HO_RE
		   WHERE HO_RE.id_region = $r[0] AND HO.id_hotel = HO_HA.id_hotel AND HO.id_hotel = HO_RE.id_hotel AND HO_HA.id_habitacion = HA.id_habitacion
  		   ORDER BY popular DESC LIMIT 1;";
      $result2 = $db33 -> prepare($query2);
      $result2 -> execute();
      $dataCollected2 = $result2 -> fetchAll();
	  foreach ($dataCollected2 as $p) {
      echo "<tr> <td>$r[1]</td> <td>$p[0]</td>  <td>$p[1]</td> <td>$p[2]</td> </tr>";
  }}
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

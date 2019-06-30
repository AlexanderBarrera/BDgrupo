<?php include('../templates/header.php');   ?>

<body>
  <!--   7. Dado un id de reserva, muestre el nombre del usuario que hizo la reserva junto al monto
  total que paga por esa reserva.-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var = $_POST["id"];
  $var = (int)$var;

  echo "<h1> Costo total de la reserva de id: $var </h1>";

  
  $query = "SELECT U.nombre, SUM(HAB.precio) as total FROM usuarios U, reservas_usuarios R_U, reservas_habit RES_HAB, habitaciones HAB WHERE R_U.id_reserva = $var and U.id_usuario = R_U.id_usuario and RES_HAB.id_reserva = R_U.id_reserva and HAB.id_habitacion = RES_HAB.id_habitacion GROUP BY U.nombre;";


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
      <th>Usuario</th>
      <th>Precio total</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

<?php include('../templates/header.php');   ?>

<body>
  <!--   7. Dado un id de reserva, muestre el nombre del usuario que hizo la reserva junto al monto
  total que paga por esa reserva.-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_SESSION["login_id"];
  $var = (int)$var;

    echo("<h1>Sus reservas:</h1>");
  $query = "SELECT RES_HAB.id_reserva, HAB.nombre, HAB.precio FROM usuarios U, reservas_usuarios R_U, reservas_habit RES_HAB, habitaciones HAB WHERE '$var' = U.id_usuario and '$var' = R_U.id_usuario and RES_HAB.id_reserva = R_U.id_reserva and HAB.id_habitacion = RES_HAB.id_habitacion;";


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
      <th>Id reserva</th>
      <th>Nombre Habitación</th>
      <th>Precio total</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

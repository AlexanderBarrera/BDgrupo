<?php include('../templates/header.php');   ?>

<body>
   <!--  6. Entregue todos los usuarios que han reservado la habitaci´on m´as barata en la regi´on
  II-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  echo "<h1> Usuarios con reserva en la habitación más barata II región  </h1>";

  $query = "SELECT U.id_usuario, U.nombre, HAB.id_habitacion, HAB.precio FROM usuarios U, hotel_habit HO_HA, hotel_region HO_RE, reservas_habit RES_HAB, habitaciones HAB, reservas_usuarios RES_US WHERE HO_HA.id_hotel = HO_RE.id_hotel AND HO_RE.id_region = 1 AND RES_HAB.id_habitacion = HO_HA.id_habitacion AND RES_US.id_reserva = RES_HAB.id_reserva AND RES_US.id_usuario = U.id_usuario AND HO_HA.id_habitacion = Hab.id_habitacion AND Hab.precio = (Select MIN(precio) from habitaciones);";
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
    <th>ID Usuario</th>
      <th>Usuario</th>
      <th>Habitación</th>
      <th>Precio</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

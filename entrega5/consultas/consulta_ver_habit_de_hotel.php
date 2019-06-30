<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $id_hot = $_POST["id_hot"];
  $id_hot = (int)$id_hot;
  $nombre_hot = $_POST["nombresin"];
  $tel = $_POST["telefono_hot"];
  $est = $_POST["estrellas_hot"];
  $dir = $_POST["direccion_hot"];
  $desc = $_POST["descripcion_hot"];
  echo " <div class='row justify-content-center'>
         <h1> $nombre_hot</h1>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Descripción $desc </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Estrellas $est </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Dirección $dir </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Telefono $tel </h5>
  		 </div>";
  
  echo " <div class='row justify-content-center'>
         <h5> Habitaciones del $nombre_hot</h5>
		 </div>";

  $query = "SELECT A.nombre, A.precio, A.id_habitacion
            FROM habitaciones A, hotel_habit H_A
			WHERE H_A.id_hotel = $id_hot AND A.id_habitacion = H_A.id_habitacion;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
		    <th scope="col">Precio</th>
        <th scope="col">Reservar</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $r) {  
    echo "<tr>
		     <td>$r[0]</td>
             <td>$r[1]</td>";

    if (!isset($_SESSION['login_user'])) {
      echo "<td>
      </td>";
    }

    else {
      echo "<td>
      <a href='http://bases.ing.puc.cl/~grupo33/entrega5/consultas/reserva_hab_hotel.php?var=$r[2]'> Reservar </a>
      </td>";
    }

    echo "</tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

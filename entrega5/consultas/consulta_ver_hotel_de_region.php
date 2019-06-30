<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  <div class="row justify-content-center">
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $var1 = $_POST["id"];
  $var1 = (int)$var1;
  $var2 = $_POST["nombre"];

  echo "<h1> Seleccionar el hotel de la región $var2</h1>";

  $query = "SELECT H.id_hotel, H.nombre, H.telefono, H.estrellas, H.direccion, H.descripcion
            FROM hoteles H, hotel_region HR WHERE HR.id_region = $var1 AND H.id_hotel = HR.id_hotel;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
		<th scope="col">Estrellas</th>
        <th scope="col">Ir al hotel</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $resp) {  
    echo "<tr>
		     <td>$resp[1]</td>
             <td>$resp[3]</td> 			 
			 <td> 
			    <form action='consulta_ver_habit_de_hotel.php' method='post'>
				  <input type='hidden' id='id_hot' name='id_hot' value='$resp[0]'>
				  <input type='hidden' id='telefono_hot' name='telefono_hot' value='$resp[2]'>
				  <input type='hidden' id='estrellas_hot' name='estrellas_hot' value='$resp[3]'>
				  <input type='hidden' id='direccion_hot' name='direccion_hot' value='$resp[4]'>
				  <input type='hidden' id='descripcion_hot' name='descripcion_hot' value='$resp[5]'>
				  <input type='hidden' id='nombresin' name='nombresin' value='$resp[1]'>
	              <button type='submit' class='btn btn-secondary'>Ver habitaciones</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

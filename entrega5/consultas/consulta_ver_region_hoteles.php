<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  <div class="row justify-content-center">
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  echo "<h1> Seleccionar la región para ver sus hoteles</h1>";
  
  $query = "SELECT RE.id_region, RE.nombre FROM regiones RE;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  <div class="row justify-content-center">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Región</th>
        <th scope="col">Ir a la región</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $r) {  
    echo "<tr>
		     <td>$r[1]</td> 
			 <td> 
			    <form action='consulta_ver_hotel_de_region.php' method='post'>
				  <input type='hidden' id='id' name='id' value='$r[0]'>
				  <input type='hidden' id='nombre' name='nombre' value='$r[1]'>
	              <button type='submit' class='btn btn-secondary'>Ver hoteles</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
  </div>
 </div>
<?php include('../templates/footer.html'); ?>

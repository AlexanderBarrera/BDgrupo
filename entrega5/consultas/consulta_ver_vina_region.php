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

  echo "<h1> Viñas de la region $var2</h1>";

  $query = "SELECT V.nombre_vina, V.telefono
            FROM vinas V WHERE V.rid = $var1;";
  $result = $db56 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>

      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $resp) {  
    echo "<tr>
		      <td>$resp[0]</td>
          <td>$resp[1]</td> 			 
			 
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>
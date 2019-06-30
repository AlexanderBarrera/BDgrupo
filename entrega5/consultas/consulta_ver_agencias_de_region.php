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

  echo "<h1> Seleccionar la agencia de la región $var2</h1>";

  $query = "SELECT A.id_agencia, A.nombre, A.direccion, A.telefono
            FROM agencias A, agencia_region A_R 
			WHERE A_R.id_region = $var1 AND A_R.id_agencia = A.id_agencia;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir a la agencia</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $resp) {  
    echo "<tr>
		     <td>$resp[1]</td>			 
			 <td> 
			    <form action='consulta_ver_tours_de_agencia.php' method='post'>
				  <input type='hidden' id='id_ag' name='id_ag' value='$resp[0]'>
				  <input type='hidden' id='telefono_ag' name='telefono_ag' value='$resp[3]'>
				  <input type='hidden' id='direccion_ag' name='direccion_ag' value='$resp[2]'>
				  <input type='hidden' id='nombresin' name='nombresin' value='$resp[1]'>
	              <button type='submit' class='btn btn-secondary'>Ver tours</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

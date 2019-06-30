<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  
  $preg = $_POST["quer"];
  
  echo " <div class='row justify-content-center'>
         <h1> Resultados para: $preg </h1>
  		 </div>";

  echo " <div class='row justify-content-center'>
         <h3> Hoteles </h3>
  		 </div>";
  
  $query = "SELECT H.id_hotel, H.nombre, H.telefono, H.estrellas, H.direccion, H.descripcion
            FROM hoteles H
			WHERE H.nombre LIKE '%$preg%';";
			
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  <div class='row justify-content-center'>
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
	              <button type='submit' class='btn btn-secondary'>Ver hotel</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
  </div>
  
  
  <?php
  echo " <div class='row justify-content-center'>
         <h3> Restaurantes </h3>
  		 </div>";

  $query1 = "SELECT R.id_restaurante, R.nombre, R.direccion, R.telefono, R.descripcion
            FROM restaurantes R
			WHERE R.nombre LIKE '%$preg%';";
  $result1 = $db33 -> prepare($query1);
  $result1 -> execute();
  $dataCollected1 = $result1 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <div class='row justify-content-center'>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir al restaurante</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected1 as $resp) {  
    echo "<tr>
		     <td>$resp[1]</td>			 
			 <td> 
			    <form action='consulta_ver_plato_de_restaurante.php' method='post'>
				  <input type='hidden' id='id_res' name='id_res' value='$resp[0]'>
				  <input type='hidden' id='telefono_res' name='telefono_res' value='$resp[3]'>
				  <input type='hidden' id='direccion_res' name='direccion_res' value='$resp[2]'>
				  <input type='hidden' id='descripcion_res' name='descripcion_res' value='$resp[4]'>
				  <input type='hidden' id='nombresin' name='nombresin' value='$resp[1]'>
	              <button type='submit' class='btn btn-secondary'>Ver restaurante</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
  </div>
  
  
  
  
  <?php
  echo " <div class='row justify-content-center'>
         <h3> Agencias de turismo </h3>
  		 </div>";

  $query2 = "SELECT A.id_agencia, A.nombre, A.direccion, A.telefono
            FROM agencias A 
			WHERE A.nombre LIKE '%$preg%';";
			
  $result2 = $db33 -> prepare($query2);
  $result2 -> execute();
  $dataCollected2 = $result2 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
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
  foreach ($dataCollected2 as $resp) {  
    echo "<tr>
		     <td>$resp[1]</td>			 
			 <td> 
			    <form action='consulta_ver_tours_de_agencia.php' method='post'>
				  <input type='hidden' id='id_ag' name='id_ag' value='$resp[0]'>
				  <input type='hidden' id='telefono_ag' name='telefono_ag' value='$resp[3]'>
				  <input type='hidden' id='direccion_ag' name='direccion_ag' value='$resp[2]'>
				  <input type='hidden' id='nombresin' name='nombresin' value='$resp[1]'>
	              <button type='submit' class='btn btn-secondary'>Ver agencia</button>                
				</form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>

  
  <?php
  require("../config/conexion2.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  echo " <div class='row justify-content-center'>
         <h3> Parques Nacionales </h3>
       </div>";

  $query3 = "SELECT *
            FROM parques P 
      WHERE P.nombre LIKE '%$preg%';";
      
  $result3 = $db56 -> prepare($query3);
  $result3 -> execute();
  $dataCollected3 = $result3 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir al parque</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected3 as $resp) {  
    echo "<tr>
         <td>$resp[1]</td>       
       <td> 
          <form action='consultas/consulta_parques.php' method='post'>
          <input type='hidden' id='pid' name='pid' value='$resp[0]'>
          <input type='hidden' id='nombre_parque' name='nombre_parque' value='$resp[1]'>
          <input type='hidden' id='rid' name='rid' value='$resp[2]'>
          <input type='hidden' id='descripcion' name='descripcion' value='$resp[3]'>
          <input type='hidden' id='hectareas' name='hectareas' value='$resp[4]'>
          <input type='hidden' id='tarifa' name='tarifa' value='$resp[5]'>
                <button type='submit' class='btn btn-secondary'>Ver agencia</button>                
        </form>
       </td>
      </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>

   <?php

  echo " <div class='row justify-content-center'>
         <h3> Viñas </h3>
       </div>";

  $query4 = "SELECT *
            FROM vinas V 
      WHERE V.nombre_vina LIKE '%$preg%';";
      
  $result4 = $db56 -> prepare($query4);
  $result4 -> execute();
  $dataCollected4 = $result4 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir a la viña</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected4 as $resp) {  
    echo "<tr>
         <td>$resp[2]</td>       
       <td> 
          <form action='consultas/consulta_vinas.php' method='post'>
          <input type='hidden' id='vid' name='vid' value='$resp[0]'>
          <input type='hidden' id='rid' name='rid' value='$resp[1]'>
          <input type='hidden' id='nombre_vina' name='nombre_vina' value='$resp[2]'>
          <input type='hidden' id='telefono' name='telefono' value='$resp[3]'>
          <input type='hidden' id='descripcion' name='descripcion' value='$resp[4]'>
                <button type='submit' class='btn btn-secondary'>Ver viña</button>                
        </form>
       </td>
      </tr>";

   }
   ?>
    </tbody>
    </table>
 </div>


  <?php

  echo " <div class='row justify-content-center'>
         <h3> Enotours </h3>
       </div>";

  $query5 = "SELECT *
            FROM enotours E 
      WHERE E.nombre_enoturismo LIKE '%$preg%';";
      
  $result5 = $db56 -> prepare($query5);
  $result5 -> execute();
  $dataCollected5 = $result5 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir al tour</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected5 as $resp) {  
    echo "<tr>
         <td>$resp[2]</td>       
       <td> 
          <form action='consultas/consulta_tours.php' method='post'>
          <input type='hidden' id='vid' name='vid' value='$resp[0]'>
          <input type='hidden' id='eid' name='eid' value='$resp[1]'>
          <input type='hidden' id='nombre_enoturismo' name='nombre_enoturismo' value='$resp[2]'>
          <input type='hidden' id='precio' name='precio' value='$resp[3]'>
                <button type='submit' class='btn btn-secondary'>Ver tour</button>                
        </form>
       </td>
      </tr>";

   }
   ?>
    </tbody>
    </table>
 </div>















<?php include('../templates/footer.html'); ?>

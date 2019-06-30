<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $id_hot = $_POST["pid"];
  $id_hot = (int)$id_hot;
  $nombre_hot = $_POST["nombre_parque"];
 
  echo " <div class='row justify-content-center'>
         <h1> $nombre_hot</h1>
  		 </div>";
  
  
		 
  $query = "SELECT A.nombre_atractivo, S.nombre_sendero
            FROM parques P, senderos S, atractivos A
			WHERE A.pid = $id_hot AND S.pid = $id_hot AND P.pid = $id_hot;";
			
  $result = $db56 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
		<th scope="col">Atractivos</th>
		<th scope="col">Senderos</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $r) {  
    echo "<tr>
             <td>$r[0]</td> 
			 <td>$r[1]</td> 
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>
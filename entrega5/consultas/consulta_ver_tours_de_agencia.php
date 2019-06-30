<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $id_hot = $_POST["id_ag"];
  $id_hot = (int)$id_hot;
  $nombre_hot = $_POST["nombresin"];
  $tel = $_POST["telefono_ag"];
  $dir = $_POST["direccion_ag"];
 
  echo " <div class='row justify-content-center'>
         <h1> $nombre_hot</h1>
  		 </div>";
  
  echo " <div class='row justify-content-center'>
         <h5> Dirección $dir </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Telefono $tel </h5>
  		 </div>";
  
  echo " <div class='row justify-content-center'>
         <h5> Tours </h5>
		 </div>";
		 
  $query = "SELECT T.descripcion, T.precio
            FROM tours T, tour_agencia T_A
			WHERE T_A.id_agencia = $id_hot AND T.id_tour = T_A.id_tour;";
			
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
		<th scope="col">Descripción</th>
		<th scope="col">Precio</th>
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

<?php include('../templates/header.php');   ?>

<body>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <div class="col center">
  
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  $id_hot = $_POST["id_res"];
  $id_hot = (int)$id_hot;
  $nombre_hot = $_POST["nombresin"];
  $tel = $_POST["telefono_res"];
  $dir = $_POST["direccion_res"];
  $desc = $_POST["descripcion_res"];
  echo " <div class='row justify-content-center'>
         <h1> $nombre_hot</h1>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Descripción $desc </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Dirección $dir </h5>
  		 </div>";
  echo " <div class='row justify-content-center'>
         <h5> Telefono $tel </h5>
  		 </div>";
  
  echo " <div class='row justify-content-center'>
         <h5> Platos </h5>
     </div>";
     
  echo "
  <div class='row justify-content-center'>
   <form action='../users/agregar_favorito.php' method='post'>
  <input type='hidden' id='id_restaurant' name='id_restaurant' value='$id_hot'>
    <button type='submit' class='btn btn-secondary'>Agregar a Favoritos</button> 
    </form>
    </div>";

  $query = "SELECT P.nombre, P.descripcion, P.precio
            FROM platos P, restaurantes_platos R_P
			WHERE R_P.id_restaurante = $id_hot AND P.id_plato = R_P.id_plato;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
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
			 <td>$r[2]</td> 
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

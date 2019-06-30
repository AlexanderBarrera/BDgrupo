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

  echo "<h1> Seleccionar el restaurante de la región $var2</h1>";
  
  $query = "SELECT R.id_restaurante, R.nombre, R.direccion, R.telefono, R.descripcion
            FROM restaurantes R, restaurantes_regiones R_R 
			WHERE R_R.id_region = $var1 AND R_R.id_restaurante = R.id_restaurante;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  </div>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ir al restaurante</th>
        <th scope="col">Agregar a favoritos</th>
      </tr>
    </thead>
    <tbody>
  <?php
  foreach ($dataCollected as $resp) {  
    echo "<tr>
		     <td>$resp[1]</td>			 
			 <td> 
			    <form action='consulta_ver_plato_de_restaurante.php' method='post'>
				  <input type='hidden' id='id_res' name='id_res' value='$resp[0]'>
				  <input type='hidden' id='telefono_res' name='telefono_res' value='$resp[3]'>
				  <input type='hidden' id='direccion_res' name='direccion_res' value='$resp[2]'>
				  <input type='hidden' id='descripcion_res' name='descripcion_res' value='$resp[4]'>
				  <input type='hidden' id='nombresin' name='nombresin' value='$resp[1]'>
	        <button type='submit' class='btn btn-secondary'>Ver platos</button>                
        </form></td>
        <td><form action='../users/agregar_favorito.php' method='post'>
        <input type='hidden' id='id_restaurant' name='id_restaurant' value='$resp[0]'>
          <button type='submit' class='btn btn-secondary'>Agregar</button> 
          </form>
			 </td>
		  </tr>";
  }
  ?>
    </tbody>
  </table>
 </div>
<?php include('../templates/footer.html'); ?>

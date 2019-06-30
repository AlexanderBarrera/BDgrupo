<?php include('../templates/header.php');?>
 <div class="row justify-content-center">
      <?php
        require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
        $name = $_SESSION["login_user"];

        $query = "SELECT nombre, fecha_nacimiento, email, nacionalidad FROM usuarios as u WHERE u.email = '$name'";

        $result = $db33 -> prepare($query);
        $result -> execute();
        $dataCollected = $result -> fetchAll();
      ?>
      <p><img src="img_user.jpg" height="80" width="80"> <br>
      Bienvenido <strong><?php echo($dataCollected[0][0])?></strong><br>
      Fecha_nacimiento: <strong><?php echo($dataCollected[0][1])?></strong><br>
      Email: <strong><?php echo($dataCollected[0][2])?></strong><br>
      Nacionalidad: <strong><?php echo($dataCollected[0][3])?></strong><br>
    </p>
</div>
<div class="row justify-content-center">
    <div class="col">
    <form action="reservas.php" method="post">
    <div class="form-group">
	   <label>Ver todas mis reservas</label>
	 </div>
    <button type="submit" class="btn btn-secondary">Buscar</button>
    </form>
   </div>
   <div class="col">
    <form action="senderos.php" method="post">
    <div class="form-group">
	   <label>Ver todos mis senderos</label>
	 </div>
    <button type="submit" class="btn btn-secondary">Buscar</button>
    </form>
   </div>
   <div class="col">
    <form action="restaurantes.php" method="post">
    <div class="form-group">
	   <label>Ver todos mis restaurantes favoritos</label>
	 </div>
    <button type="submit" class="btn btn-secondary">Buscar</button>
    </form>
   </div>
</div>
   
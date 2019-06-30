<?php include('../templates/header.php');   ?>

<body>
  <div class="col center">
  <div class="row justify-content-center">
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33
  if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
    exit;
  }

  $var1 = (int)$_POST["id_restaurant"];
  $var2 = (int)$_SESSION["login_id"];
  
  $query = "INSERT INTO favoritos VALUES ('$var2', '$var1');";
  $result = $db33 -> prepare($query);
  $result -> execute();
  ?>
  </div>
 </div>
<?php header('Location: restaurantes.php');
exit; ?>


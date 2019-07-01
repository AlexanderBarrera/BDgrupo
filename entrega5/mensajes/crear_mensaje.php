<?php include('../templates/header.php');   ?>

<body>
<div class="container">
  <h1>Crear Mensaje</h1><br>
  <?php 
    $method = 'POST';
    $_POST["de"] = $_SESSION['login_id'];
    $data = $_POST;
    $url = 'https://entrega05bd.herokuapp.com/crear_mensajes';
    $result = CallAPI($method, $url, $data);  
   if ($result == TRUE) {
     echo("<h5>Mensaje creado satisfactoriamente</h5>");
   }
   else {
    echo("<h5>Error al crear mensaje</h5>");
   }
  ?>
  <?php include('../templates/footer.html'); ?>
</div>

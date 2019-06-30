<?php include('../templates/header.php');   ?>

<body>
  <h1>Crear Mensaje</h1><br>
  <?php 
    $method = 'POST';
    $_POST["de"] = $_SESSION['login_id'];
    $data = $_POST;
    $url = 'https://entrega05bd.herokuapp.com/crear_mensajes';
    $result = CallAPI($method, $url, $data);  
    echo($result);
   if ($result == TRUE) {
     echo("<h3>Mensaje Creado</h3>");
   }
   else {
    echo("<h3>Error al crear mensaje</h3>");
   }
  ?>
<?php include('../templates/footer.html'); ?>

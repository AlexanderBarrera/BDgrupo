<?php
  try {
    require('data.php'); #Pide las variables para conectarse a la base de datos.
    $db33 = new PDO("pgsql:dbname=$DBgrupo33;host=localhost;port=5432;user=$DBuser33;password=$DBpassword33");
    $db56 = new PDO("pgsql:dbname=$DBgrupo56;host=localhost;port=5432;user=$DBuser56;password=$DBpassword56");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
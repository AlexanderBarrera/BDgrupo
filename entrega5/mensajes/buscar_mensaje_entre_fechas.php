<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <style>
    #map {position: absolute; ; top: 0; bottom: 0; left: 0; right: 0;}
  </style>
</head>
 <?php include('../templates/header.php');   ?>
  <style type="text/css">
    .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
    .myTable th { background-color:#000;color:white;width:50%; }
    .myTable td, .myTable th { padding:5px;border:1px solid #000; }
  </style>


<body> 
    <div id = "map"></div>
    <?php
      function check_in_range($fecha_inicio, $fecha_fin, $fecha){

         $fecha_inicio = strtotime($fecha_inicio);
         $fecha_fin = strtotime($fecha_fin);
         $fecha = strtotime($fecha);
         if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
             return true;
         else
             return false;
      }
      $method = 'GET';
      $url = 'https://entrega05bd.herokuapp.com/users/'. $_SESSION['login_id'];
      $fecha1 = $_POST["fecha1"];
      $fecha2 = $_POST["fecha2"];
      $result = CallAPI($method, $url, $data = false); 
      $result = json_decode($result, true); 
      array_shift($result); // El  primer elemento es la información del usuario
      array_shift($result);
      echo "<script>
        var map = L.map('map', {center: [-33.5518259, -71.0263392], zoom: 2});
        L.tileLayer('https://api.maptiler.com/maps/basic/{z}/{x}/{y}.png?key=4bJpjxXrOomrAEGj6Y5e').addTo(map);";
      foreach ($result as $mensaje) {
        if (check_in_range($fecha1, $fecha2, $mensaje['date'])) {
          echo "var marker = L.marker([$mensaje[lat], $mensaje[long]]).addTo(map);";
          echo "marker.bindPopup('$mensaje[message]');";
        }
        
      }
      echo "</script>";
    ?>
  <?php include('../templates/footer.html'); ?>


</body>
</html>

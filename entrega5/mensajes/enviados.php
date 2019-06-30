<?php include('../templates/header.php');   ?>
<style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
</style>

<body>
  <h1>Enviados</h1>
  <?php 
    $method = 'GET';
    $url = 'https://entrega05bd.herokuapp.com/users/'. $_SESSION['login_id'];
    $result = CallAPI($method, $url, $data = false); 
    $result = json_decode($result, true); 
    array_shift($result); // El  primer elemento es la información del usuario
  ?>
  <table class="myTable">
    <tr>
      <th>Contenido</th>
      <th>Fecha</th>
      <th>Id receptor</th>
    </tr>
  <?php
  foreach ($result as $p) {
    $message = $p['message'];
    $receptant = $p['receptant'];
    $date = $p['date'];
    echo "<tr> <td>$message</td> <td>$date</td><td>$receptant</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

<?php include('../templates/header.php');   ?>
<style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
</style>

<body>
  <h1>Inbox</h1>
  <?php 
    $method = 'GET';
    $url = 'https://entrega05bd.herokuapp.com/recibidos/'. $_SESSION["login_id"];
    $result = CallAPI($method, $url, $data = false); 
    $result = json_decode($result, true); 
  ?>
  <table class="myTable">
    <tr>
      <th>Contenido</th>
      <th>Fecha</th>
      <th>Id sender</th>
    </tr>
  <?php
  foreach ($result as $p) {
    $message = $p['message'];
    $sender = $p['sender'];
    $date = $p['date'];
    echo "<tr> <td>$message</td> <td>$date</td><td>$sender</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

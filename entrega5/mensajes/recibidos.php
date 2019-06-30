<?php include('../templates/header.php');   ?>

<body>
  <?php

  echo "<h1> Inbox </h1>";
  ?>
<style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
  </style>

  <table class="myTable">
    <tr>
      <th>Habitación</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td><td>$p[2]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>

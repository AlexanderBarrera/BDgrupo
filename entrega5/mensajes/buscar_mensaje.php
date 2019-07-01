<?php include('../templates/header.php');  ?>

<body>
  <h1>Buscar Mensaje</h1><br>
  <?php 
    $method = 'POST';
    $data = $_POST;
    $url = 'https://entrega05bd.herokuapp.com/mensajes/buscar_json';
    $result = json_decode(CallAPI($method, $url, $data), true);
  ?>
  <div class="container">
  <table class="table table-striped">
      <thead>
          <tr>
              <th>Contenido</th>
              <th>Id usuario</th>
              <th>Id receptor</th>
              <th>Latitud</th>
              <th>Longitud</th>
              <th>Fecha</th>
          </tr>
      </thead>
      <tbody>
        <?php
          foreach ($result as $re) {
            echo "<tr>
                    <td>$re[message]</td>
                    <td>$re[sender]</td>
                    <td>$re[receptant]</td>
                    <td>$re[lat]</td>
                    <td>$re[long]</td>
                    <td>$re[date]</td>
                  </tr>";
          } 
        ?>
      </tbody>
  </table>
  <?php include('../templates/footer.html'); ?>
</div>
</body>
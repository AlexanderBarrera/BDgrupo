<?php session_start();?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title>ROnCHA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="C ontent-Type" content="text/html; charset=UTF-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/c3/0.1.29/c3.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/c3/0.1.29/c3.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="http://bases.ing.puc.cl/~grupo33/entrega5/index.php">ROnCHA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/~grupo33/entrega5/index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (!isset($_SESSION['login_user'])) {
                      echo("Inicie Sesion");
                    }
                      else {
                        echo($_SESSION["login_user"]);
                      }
                     ?>
                </a>
              <div class="dropdown-menu ">
              <?php if (!isset($_SESSION['login_user'])) {
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/users/login.php">Login</a>');
              }
                else {
                  echo('<a class="dropdown-item" href="/~grupo33/entrega5/users/userpage.php">Perfil</a>');
                }
              ?>
              <a class="dropdown-item" href="/~grupo33/entrega5/users/logout.php">Logout</a>
              </div>
              <?php if (isset($_SESSION['login_user'])) {
                echo('<li class="nav-item dropdown">');
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ');
                echo('Mensajes');
                echo('<div class="dropdown-menu ">');
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/mensajes/recibidos.php">Inbox</a>');
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/mensajes/enviados.php">Enviados</a>');
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/mensajes/nuevo.php">Nuevo mensaje</a>');
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/mensajes/buscar.php">Buscar mensaje</a>');
                echo('<a class="dropdown-item" href="/~grupo33/entrega5/mensajes/entre_fechas.php">Buscar mensaje entre fechas</a>');
                echo('</div>');
                echo('</li>');
              }
              ?>
            <li class="nav-item">
              <a class=nav-link href="/~grupo33/entrega5/consultas/dashboard.php">
                Dashboard
              </a>
            </li>
          </ul>
        </div>
        <div class="container" style="height: 40px"> 
          <form action='/~grupo33/entrega5/buscar.php' method='post' class="form-row">
          <div class="row justify-content-right">
                <div class="col center">
            <input class="form-control" type="text" placeholder="Buscar" id="quer" name="quer">
          </div>
          <div class="col center">
                <button type='submit' class='btn btn-secondary'>Buscar</button>               
            </div>
            </div>
          </form>
          </div>
    </nav>
  </head>
  <br>
  <body>
  <div class="container-fluid">

<?php
  function CallAPI($method, $url, $data = false)
  {
      $curl = curl_init();

      switch ($method)
      {
          case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);

              if ($data)
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
          case "PUT":
              curl_setopt($curl, CURLOPT_PUT, 1);
              break;
          default:
              if ($data)
                  $url = sprintf("%s?%s", $url, http_build_query($data));
      }


      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      $result = curl_exec($curl);

      curl_close($curl);

      return $result;
  }
?>
   <!--   5. Para cada regi´on, entregue la habitaci´on que ha sido reservada m´as veces.-->
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db33

  echo "<h1> Dashboard </h1>";
  
  $query = "SELECT RE.id_region, RE.nombre FROM regiones RE;";
  $result = $db33 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  <!--Sacado de: https://stackoverflow.com/questions/31387455/loading-c3-js-into-an-html-file -->
  
  <?php
  echo "<h3>Habitaciones reservadas por región</h3>
  <div id='coso'></div>
  <script type='text/javascript' charset='utf-8'>
    var chart = c3.generate({
    bindto: '#coso',
    data: {
      columns: [";
  $k = 0;
  foreach ($dataCollected as $r) {
	  $query2 = "SELECT count(RE_HA.id_habitacion)
		   FROM hoteles HO, hotel_habit HO_HA, habitaciones HA, hotel_region HO_RE, reservas_habit RE_HA
		   WHERE HO_RE.id_region = $r[0]       AND HO.id_hotel = HO_HA.id_hotel 
		     AND HO.id_hotel = HO_RE.id_hotel  AND HO_HA.id_habitacion = HA.id_habitacion
			 AND RE_HA.id_habitacion = HA.id_habitacion;";
      $result2 = $db33 -> prepare($query2);
      $result2 -> execute();
      $dataCollected2 = $result2 -> fetchAll();  
	  foreach ($dataCollected2 as $p) {
      $nuevo = str_replace('\'', '', $r[1]);
		  if ($k == 0){
		  echo " ['$nuevo', $p[0]] ";
			$k = 1;
		  }
		  else echo ", ['$nuevo', $p[0]] "; 
        }
	  }
  echo "
      ],
      type: 'bar',

    },
    axis: {
        y: {
            max: 5000,
            min: 0,
            padding: { top: 0, bottom: 0 }
        }
    }
});
  </script>";
  ?>

  <!-- grafico de cepas por region -->
  <?php
    $query = "SELECT regiones.nombre, COUNT(DISTINCT vinos.cepa)
              FROM vinas, vinos, regiones
              WHERE vinas.vid = vinos.vid AND regiones.rid = vinas.rid
              GROUP BY regiones.nombre";
    $cepas_region = $db56 -> prepare($query);
    $cepas_region -> execute();
    $data = $cepas_region -> fetchAll();
    echo "<h3>Cepas de vino por región</h3>
	<div id='cepas_region'></div>
          <script type='text/javascript' charset='utf-8'>
            var chart = c3.generate({
            bindto: '#cepas_region',
            data: {
              columns: [";
    $k = 0;
    foreach ($data as $p) {
      $nuevo = str_replace('\'', '', $p[0]);
      if ($k == 0){
      echo " ['$nuevo', $p[1]] ";
      $k = 1;
      }
      else { echo ", ['$nuevo', $p[1]] "; 
        }
    }
    echo "
          ],
          type: 'bar',

        },
        axis: {
            y: {
                max: 10,
                min: 0,
                padding: { top: 0, bottom: 0 }
            }
        }
    });
      </script>";

  ?>
  
    <?php
  echo "<h3>Tours disponibles por región</h3>
  <div id='coso3'></div>
  <script type='text/javascript' charset='utf-8'>
    var chart = c3.generate({
    bindto: '#coso3',
    data: {
      columns: [";
  $k = 0;
  foreach ($dataCollected as $r) {
	  $query2 = "SELECT count(T_A.id_tour)
		   FROM agencia_region A_R, tour_agencia T_A
		   WHERE A_R.id_region = $r[0]     AND A_R.id_agencia = T_A.id_agencia;";
      $result2 = $db33 -> prepare($query2);
      $result2 -> execute();
      $dataCollected2 = $result2 -> fetchAll();  
	  foreach ($dataCollected2 as $p) {
      $nuevo = str_replace('\'', '', $r[1]);
		  if ($k == 0){
		  echo " ['$nuevo', $p[0]] ";
			$k = 1;
		  }
		  else echo ", ['$nuevo', $p[0]] "; 
        }
	  }
  echo "
      ],
      type: 'bar',
    },
    axis: {
        y: {
            max: 200,
            min: 0,
            padding: { top: 0, bottom: 0 }
        }
    }
});
  </script>";
  ?>
  <?php
    $query = "SELECT regiones.nombre, COUNT(RP.id_plato)
              FROM restaurantes_regiones RR, restaurantes_platos RP, regiones
              WHERE RR.id_restaurante = RP.id_restaurante and regiones.id_region = RR.id_region
              GROUP BY regiones.nombre";
    $cepas_region = $db33 -> prepare($query);
    $cepas_region -> execute();
    $data = $cepas_region -> fetchAll();
    echo "<h3>Platos disponibles por Región</h3>
          <div id='platos_region'></div>
          <script type='text/javascript' charset='utf-8'>
            var chart = c3.generate({
            bindto: '#platos_region',
            data: {
              columns: [";
    $k = 0;
    foreach ($data as $p) {
      $nuevo = str_replace('\'', '', $p[0]);
      if ($k == 0){
      echo " ['$nuevo', $p[1]] ";
      $k = 1;
      }
      else { echo ", ['$nuevo', $p[1]] "; 
        }
    }
    echo "
          ],
          type: 'bar',

        },
        axis: {
            y: {
                max: 60,
                min: 0,
                padding: { top: 0, bottom: 0 }
            }
        }
    });
      </script>";

  ?>
<?php include('../templates/footer.html'); ?>

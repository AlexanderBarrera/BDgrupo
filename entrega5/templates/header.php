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

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="http://bases.ing.puc.cl/~grupo33/entrega3/index.php">ROnCHA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/~grupo33/entrega3/index.php">Home
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
                      echo('<a class="dropdown-item" href="/~grupo33/entrega3/users/login.php">Login</a>');
                    }
                      else {
                        echo('<a class="dropdown-item" href="/~grupo33/entrega3/users/userpage.php">Perfil</a>');
                      }
                     ?>
                <a class="dropdown-item" href="/~grupo33/entrega3/users/logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="container" style="height: 40px"> 
          <form action='/~grupo33/entrega3/buscar.php' method='post' class="form-row">
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
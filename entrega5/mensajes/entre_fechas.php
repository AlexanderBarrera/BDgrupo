<?php include('../templates/header.php');   ?>
<style type="text/css">
  .myTable { width:400px;background-color:#eee;border-collapse:collapse; }
  .myTable th { background-color:#000;color:white;width:50%; }
  .myTable td, .myTable th { padding:5px;border:1px solid #000; }
</style>

<body>
  <h1>Mensajes enviados entre fechas</h1>


  <h5> Fromato fecha: AAAA-MM-DD</h5>
    <form action="buscar_mensaje_entre_fechas.php" method="post">
        <div class="form-group">
            <label for="must" class="col-2 col-form-label">Fecha 1:</label>
            <input type="date" id='fecha1' name="fecha1" placeholder="Fecha 1">


            <label for="must" class="col-2 col-form-label">Fecha 2:</label>
            <input type="date" data-date-format="YYYY-MM-DD" id='fecha2' name="fecha2" placeholder="Fecha 2">

        
        <button type="submit" class="btn btn-secondary">Buscar mensajes</button>
    </form>

  

<?php include('../templates/footer.html'); ?>
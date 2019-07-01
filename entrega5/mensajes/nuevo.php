<?php include('../templates/header.php');   ?>

<body>
    <div class="container">
        <h1>Crear Mensaje</h1><br>
        <form action="crear_mensaje.php" method="post">
            <div class="form-group">
                <label for="para" class="col-2 col-form-label">Receptor</label>
                <input type="number" name="para" placeholder="Id Receptor">
            </div>
            <div class="form-group">
                <label for="latitud" class="col-2 col-form-label">Latitud</label>
                <input type="number" name="latitud" placeholder="Latitud">
            </div>
            <div class="form-group">
                <label for="longitud" class="col-2 col-form-label">Longitud</label>
                <input type="number" name="longitud" placeholder="Longitud">
            </div>
            <div class="form-group">
                <label for="contenido" class="col-2 col-form-label">Contenido</label>
                <input type="text" name="contenido" placeholder="Contenido"><br>
            </div>
            <button type="submit" class="btn btn-secondary">Crear mensaje</button>
        </form>

        <?php include('../templates/footer.html'); ?>
    </div>
</body>

<?php include('../templates/header.php');   ?>

<body>
<div class="container">
    <h5>Separar frases y palabras con ";"</h5>
    <form action="buscar_mensaje.php" method="post">
        <div class="form-group">
            <label for="must" class="col-2 col-form-label">Contenido si o si en el mensaje:</label>
            <input type="text" name="must" placeholder="Texto">
        </div>
        <div class="form-group">
            <label for="maybe" class="col-2 col-form-label">Contenido que puede estar:</label>
            <input type="text" name="maybe" placeholder="Texto">
        </div>
        <div class="form-group">
            <label for="notbe" class="col-2 col-form-label">Contenido que no debe estar:</label>
            <input type="text" name="notbe" placeholder="Texto">
        </div>
        <div class="form-group">
            <label for="pid" class="col-2 col-form-label">Id del emisor:</label>
            <input type="number" name="pid" placeholder="Id Emisor">
        </div>
        <button type="submit" class="btn btn-secondary">Buscar mensajes</button>
    </form>

<?php include('../templates/footer.html'); ?>
</div>
</body>
<div class="container col-6">
    <form id="frm-coche" action="?c=coche&a=save" method="post" enctype="multipart/form-data">
        <h1 class="page-header">
            <?php echo $coche->id != null ? 'Modificando coche' : 'Nuevo Coche'; ?>
        </h1>
        <input type="hidden" name="id" value="<?php echo $coche->id; ?>" />
        <div class="form-group mb-3">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" placeholder="Introduce marca del coche" value="<?php echo $coche->marca ?>" required>
        </div>
        <div class=" form-group mb-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="Introduce modelo del coche" value="<?php echo $coche->modelo ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Introduce precio del vehiculo" value="<?php echo $coche->precio ?>">
        </div>

        <div class="text-righe">
            <a class=" btn btn-secondary" href="index.php">Atrás</a>
            <button class="btn btn-success" type="submit">Añadir</button>
        </div>
    </form>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#frm-coche").submit(function() {
            return $(this).validate();
        });
    })
</script>

</html>
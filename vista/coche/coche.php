<div class="container box col-6">
    <table class="table  table-striped table-hover text-center " id="tabla">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($this->listar()) > 0)
                foreach ($this->listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->marca; ?></td>
                    <td><?php echo $r->modelo; ?></td>
                    <td><?php echo $r->precio; ?>€</td>
                    <td>
                        <a class="btn btn-warning me-2" href="?c=coche&a=crud&id=<?php echo $r->id; ?>">Editar</a>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=coche&a=delete&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;
            else {
                echo '<tr><td>NO HAY DATOS</td><td>NO HAY DATOS</td><td>NO HAY DATOS</td><td>NO HAY DATOS</td><td>NO HAY DATOS</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>
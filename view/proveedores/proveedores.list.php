<!--autor: Nieves Pincay Kenia-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=productos&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fa-light fa-magnifying-glass"></i>Buscar</button>
            </form>
        </div>
        <div class="">
            <a href="index.php?c=productos&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fa-light fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class=" ">
        <table class=" ">
            <thead class=" ">
                <th>Id Proveedor</th>
                <th>Nombre</th>
                <th>Direcci&oacute;n</th>
                <th>Tel&eacute;fono</th>
                <th>Fecha contrato</th>
                <th>Medio de Pago</th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_proveedor']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['fecha_contrato']; ?></td>
                        <td><?php echo $fila['nombre_medio']; ?></td>
                        <td>
                            <a class=" " href="index.php?c=productos&f=view_edit&id=<?php echo  $fila['id_proveedor']; ?>">
                                <i class="fa-light fa-pen-to-square"></i>
                            </a>
                            <a class=" " onclick="if(!confirm('Esta seguro de eliminar a este proveedor?'))return false;" href="index.php?c=productos&f=delete&id=<?php echo  $fila['id_proveedor']; ?>">
                                <i class="fa-light fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>
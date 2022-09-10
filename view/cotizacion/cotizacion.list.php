<!--autor: Aguirre Aguirre Ronaldo-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=cotizacion&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fa-light fa-magnifying-glass"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=cotizacion&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Id cotizacion</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tel&eacute;fono</th>
                <th>Direcci&oacute;n</th>
                <th>Descrici&eacute;n</th>
                <th>Presupuesto</th>
                <th>Fecha cotizacion</th>
                <th>Tipo producto</th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_cotizacion']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['presupuesto']; ?></td>
                        <td><?php echo $fila['fecha_cotizacion']; ?></td>
                        <td><?php echo $fila['id_tipo']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=cotizacion&f=view_edit&id=<?php echo  $fila['id_cotizacion']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar de eliminar la cotizacion?'))return false;" href="index.php?c=cotizacion&f=delete&id=<?php echo  $fila['id_cotizacion']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>
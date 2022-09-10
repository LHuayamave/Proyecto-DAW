<!--autor: Palacios Avila Ariel-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=solicitud_servicio&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=solicitud_servicio&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Id Servicio</th>
                <th>Nombre </th>
                <th>Correo </th>
                <th>Tel&eacute;fono </th>
                <th>Direcci&oacute;n </th>
                <th>Fecha de la Solicitud</th>
                <th>Descripci&oacute;n</th>
                <th>Tipo de Servicio</th>
                <th>Editar / Eliminar</th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_solicitud']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['fecha_solicitud']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['tipo_servicio']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=solicitud_servicio&f=view_edit&id=<?php echo  $fila['id_solicitud']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;" href="index.php?c=solicitud_servicio&f=delete&id=<?php echo  $fila['id_solicitud']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>
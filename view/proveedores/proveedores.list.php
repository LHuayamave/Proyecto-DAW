<!--autor: Nieves Pincay Kenia-->
<?php $titulo = "Lista de Proveedores";
require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=proveedores&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fa-light fa-magnifying-glass"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=proveedores&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Id Proveedor</th>
                <th>Nombre</th>
                <th>Direcci&oacute;n</th>
                <th>Tel&eacute;fono</th>
                <th>Fecha contrato</th>
                <th>Medio de Pago</th>
                <th>Editar / Borrar</th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_proveedor']; ?></td>
                        <td><?php echo $fila['nombre_proveedor']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['fecha_contrato']; ?></td>
                        <td><?php echo $fila['nombre_medio']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=proveedores&f=view_edit&id=<?php echo  $fila['id_proveedor']; ?>">
                                <i class="fas fa-marker"></i></a>
                            </a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar a este proveedor?'))return false;" href="index.php?c=proveedores&f=delete&id=<?php echo  $fila['id_proveedor']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>
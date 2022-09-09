<!--autor: Huayamave Cedeño Luis-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=productos&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=productos&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Id Producto</th>
                <th>Nombre </th>
                <th>Descripci&oacute;n </th>
                <th>Stock </th>
                <th>Fecha de Ingreso </th>
                <th>Total en $</th>
                <th>Tipo de Producto</th>
                <th>Proveedor</th>
                <th>Editar / Borrar</th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_producto']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['stock_inicial']; ?></td>
                        <td><?php echo $fila['fecha_ingreso']; ?></td>
                        <td><?php echo $fila['total']; ?></td>
                        <td><?php echo $fila['tipo_producto']; ?></td>
                        <td><?php echo $fila['nombre_proveedor']; ?></td>



                        <td>
                            <a class="btn btn-primary" href="index.php?c=productos&f=view_edit&id=<?php echo  $fila['id_producto']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;" href="index.php?c=productos&f=delete&id=<?php echo  $fila['id_producto']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>
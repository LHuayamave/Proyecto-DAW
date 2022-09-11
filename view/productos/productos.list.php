<!--autor: Huayamave Cedeño Luis-->
<?php $titulo = "Lista de productos";
require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar...">
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
                        <td><?php echo $fila['nombre_producto']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['stock_inicial']; ?></td>
                        <td><?php echo $fila['fecha_ingreso']; ?></td>
                        <td><?php echo '$' . $fila['total']; ?></td>
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

<script type="text/javascript">
    var txtBuscar = document.querySelector('#busquedaAjax');
    txtBuscar.addEventListener('keyup', cargarProducto);

    function cargarProducto() {
        var buscar = txtBuscar.value;
        var url = "index.php?c=productos&f=searchAjax&b=" + buscar;
        var xmlh = new XMLHttpRequest();
        xmlh.open("GET", url, true);
        xmlh.send();
        xmlh.onreadystatechange = function() {
            if (xmlh.readyState === 4 && xmlh.status === 200) {
                var respuesta = xmlh.responseText;
                actualizar(respuesta);
            }
        }
    }

    function actualizar(respuesta) {
        var tdbody = document.querySelector('.tabladatos');
        var producto = JSON.parse(respuesta);
        console.log(producto);
        resultados = '';
        for (var i = 0; i < producto.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + producto[i].id_producto + '</td>';
            resultados += '<td>' + producto[i].nombre_producto + '</td>';
            resultados += '<td>' + producto[i].descripcion + '</td>';
            resultados += '<td>' + producto[i].stock_inicial + '</td>';
            resultados += '<td>' + producto[i].fecha_ingreso + '</td>';
            resultados += '<td>' + producto[i].total + '</td>';
            resultados += '<td>' + producto[i].tipo_producto + '</td>';
            resultados += '<td>' + producto[i].nombre_proveedor + '</td>';
            resultados += '<td>' +
                "<a href='index.php?c=productos&f=view_edit&id=" + producto[i].id_producto +
                "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>" +
                "<a href='index.php?c=productos&f=delete&id=" + producto[i].id_producto + "'" +
                "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar el prodcuto: '" + producto[i].nombre_producto +
                " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
            resultados += '</tr>';
        }
        tdbody.innerHTML = resultados;
    }
</script>
<?php require_once FOOTER ?>
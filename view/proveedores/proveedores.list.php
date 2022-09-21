<!--autor: Nieves Pincay Kenia-->
<?php $link = "index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion = "Salir";
$titulo = "Lista de Proveedores";
require_once HEADER; ?>

<div class="container">
    <div class="row" id="form">
        <div class="col-sm-6 componente">
            <img src="assets/imagenes/buscar.png" class="icono" />
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar...">
        </div>

        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=proveedores&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Nuevo
                </button>
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
                <?php
                if ($_SESSION['rol']  == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                    <th>Editar / Borrar</th>
                <?php } ?>
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
                        <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                            <td>
                                <a class="btn btn-primary" href="index.php?c=proveedores&f=view_edit&id=<?php echo  $fila['id_proveedor']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                </a>
                            <?php } ?>

                            <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 3) { ?>
                                <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar a este proveedor?'))return false;" href="index.php?c=proveedores&f=delete&id=<?php echo  $fila['id_proveedor']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var txtBuscar = document.querySelector('#busquedaAjax');
    txtBuscar.addEventListener('keyup', cargarProveedor);

    function cargarProveedor() {
        var bus = txtBuscar.value;
        var url = "index.php?c=proveedores&f=searchAjax&b=" + bus;
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
        var proveedor = JSON.parse(respuesta);
        console.log(proveedor);
        resultados = '';
        for (var i = 0; i < proveedor.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + proveedor[i].id_proveedor + '</td>';
            resultados += '<td>' + proveedor[i].nombre_proveedor + '</td>';
            resultados += '<td>' + proveedor[i].direccion + '</td>';
            resultados += '<td>' + proveedor[i].telefono + '</td>';
            resultados += '<td>' + proveedor[i].fecha_contrato + '</td>';
            resultados += '<td>' + proveedor[i].nombre_medio + '</td>';
            <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>

                resultados += '<td>' +
                    "<a href='index.php?c=videojuegos&a=editar&id=" + proveedor[i].id +
                    "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>"
            <?php } ?>
            <?php if ($_SESSION['rol'] == 3) { ?>
                    "<a href='index.php?c=videojuego&a=eliminar&id=" + proveedor[i].id + "'" +
                    "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + proveedor[i].nombre_proveedor +
                    " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
                resultados += '</tr>';
            <?php } ?>

        }
        tdbody.innerHTML = resultados;
    }
</script>

<?php require_once FOOTER ?>
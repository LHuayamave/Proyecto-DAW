<!--autor: Aguirre Aguirre Ronaldo-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar por nombre" />
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
                <th>Editar / Borrar</th>
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
                        <td><?php echo $fila['tipo_producto']; ?></td>
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

<script type="text/javascript">
    var txtBuscar = document.querySelector("#busquedaAjax");
    txtBuscar.addEventListener('keyup', cargarcotizacion);

    function cargarcotizacion() {
        // leer paramteros
        var bus = txtBuscar.value;
        // realizar la peticion
        var url = "index.php?c=cotizacion&f=searchAjax&b=" + bus;
        var xmlh = new XMLHttpRequest();
        xmlh.open("GET", url, true);
        xmlh.send();
        // lectura de respuesta
        xmlh.onreadystatechange = function() {
            if (xmlh.readyState === 4 && xmlh.status === 200) {
                var respuesta = xmlh.responseText;
                actualizar(respuesta); //actualizar cierta parte de la pagina
            }
        };
    }

    function actualizar(respuesta) {
        // elemento a actualizar
        var tbody = document.querySelector('.tabladatos');
        var cotizacion = JSON.parse(respuesta); // parse de respuesta aformato json
        console.log(cotizacion);
        resultados = '';
        for (var i = 0; i < cotizacion.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + cotizacion[i].id_cotizacion + '</td>';
            //o tambien  resultados += '<td>' + producto[i]['prod_codigo']+ '</td>';
            resultados += '<td>' + cotizacion[i].nombre + '</td>';
            resultados += '<td>' + cotizacion[i].correo + '</td>';
            resultados += '<td>' + cotizacion[i].telefono + '</td>';
            resultados += '<td>' + cotizacion[i].direccion + '</td>';
            resultados += '<td>' + cotizacion[i].descripcion + '</td>';
            resultados += '<td>' + cotizacion[i].presupuesto + '</td>';
            resultados += '<td>' + cotizacion[i].fecha_cotizacion + '</td>';
            resultados += '<td>' + cotizacion[i].id_tipo + '</td>';
            resultados += '<td>' +
                "<a href='index.php?c=cotizacion&a=editar&id=" + cotizacion[i].id_cotizacion +
                "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>" +
                "<a href='index.php?c=cotizacion&a=eliminar&id=" + cotizacion[i].id_cotizacion + "'" +
                "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + cotizacion[i].nombre +
                " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
            resultados += '</tr>';
        }
        tbody.innerHTML = resultados;
    }
</script>
<?php require_once FOOTER ?>
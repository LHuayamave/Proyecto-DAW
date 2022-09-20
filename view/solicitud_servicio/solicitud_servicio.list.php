<!--autor: Palacios Avila Ariel-->
<?php
$titulo = "Lista de Solicitudes de Servicios";
require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar...">
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=SolicitudServicio&f=view_new">
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
                        <td><?php echo $fila['id_solicitud']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['fecha_solicitud']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['tipo_servicio']; ?></td>
                        <?php
                        if ($_SESSION['rol'] == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                            <td>
                                <a class="btn btn-primary" href="index.php?c=SolicitudServicio&f=view_edit&id=<?php echo  $fila['id_solicitud']; ?>">
                                    <i class="fas fa-marker"></i></a>
                            <?php } ?>
                            <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 3) { ?>
                                <a class="btn btn-danger" onclick="if(!confirm('¿Esta seguro de que desea eliminar esta solicitud?'))return false;" href="index.php?c=SolicitudServicio&f=delete&id=<?php echo  $fila['id_solicitud']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript">
    var txtBuscar = document.querySelector('#busquedaAjax');
    txtBuscar.addEventListener('keyup', cargarSolicitudes);

    function cargarSolicitudes() {
        var buscar = txtBuscar.value;
        var url = "index.php?c=SolicitudServicio&f=searchAjax&b=" + buscar;
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
        var tbody = document.querySelector('.tabladatos');
        var solicitud = JSON.parse(respuesta);
        console.log(solicitud);
        resultados = '';
        for (var i = 0; i < solicitud.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + solicitud[i].id_solicitud + '</td>';
            resultados += '<td>' + solicitud[i].nombre + '</td>';
            resultados += '<td>' + solicitud[i].correo + '</td>';
            resultados += '<td>' + solicitud[i].telefono + '</td>';
            resultados += '<td>' + solicitud[i].direccion + '</td>';
            resultados += '<td>' + solicitud[i].fecha_solicitud + '</td>';
            resultados += '<td>' + solicitud[i].descripcion + '</td>';
            resultados += '<td>' + solicitud[i].tipo_servicio + '</td>';
            resultados += '<td>' +
                "<a href='index.php?c=SolicitudServicio&f=view_edit&id=" + solicitud[i].id_solicitud +
                "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>" +
                "<a href='index.php?c=SolicitudServicio&f=delete&id=" + solicitud[i].id_solicitud + "'" +
                "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la solicitud de: '" + solicitud[i].nombre +
                " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
            resultados += '</tr>';
        }
        tbody.innerHTML = resultados;
    }
</script>
<?php require_once FOOTER ?>
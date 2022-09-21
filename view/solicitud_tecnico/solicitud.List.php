<!--autor: Sellan Fajardo Leonardo-->
<?php
$link = "index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion = "Salir";
$titulo = "Lista de Solicitudes tecnicos";
require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar por nombre" />
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=solicitudtecnico&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Nuevo
                </button>
            </a>
        </div>
    </div>

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Fecha Solicitud</th>
                    <th>Id problema</th>
                    <?php
                    if ($_SESSION['rol']  == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                        <th>Editar / Borrar</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody class="tabladatos">
                <?php

                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_solicitud'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['apellido'] ?></td>
                        <td><?php echo $fila['correo'] ?></td>
                        <td><?php echo $fila['fecha_solicitud'] ?></td>
                        <td><?php echo $fila['id_problemas'] ?></td>
                        <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                            <td>
                                <a class="btn btn-primary" href="index.php?c=solicitudtecnico&f=view_edit&id=<?php echo  $fila['id_solicitud']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                </a>
                            <?php } ?>

                            <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 3) { ?>
                                <a class="btn btn-danger" onclick="if(!confirm('Desea eliminar esta solicitud?'))return false;
                                " href="index.php?c=solicitudtecnico&f=delete&id=<?php echo  $fila['id_solicitud']; ?>">
                                    <i class="fas fa-trash-alt"></i></a>
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br /><br />
    </div>
</div>

<script type="text/javascript">
    var txtBuscar = document.querySelector("#busquedaAjax");
    txtBuscar.addEventListener('keyup', cargarSolicitud);

    function cargarSolicitud() {
        // leer paramteros
        var bus = txtBuscar.value;
        // realizar la peticion
        var url = "index.php?c=solicitudtecnico&f=searchAjax&b=" + bus;
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

        var solicitud = JSON.parse(respuesta); // parse de respuesta aformato json
        console.log(solicitud);
        resultados = '';
        for (var i = 0; i < solicitud.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + solicitud[i].id_solicitud + '</td>';
            //o tambien  resultados += '<td>' + producto[i]['prod_codigo']+ '</td>';
            resultados += '<td>' + solicitud[i].nombre + '</td>';
            resultados += '<td>' + solicitud[i].apellido + '</td>';
            resultados += '<td>' + solicitud[i].correo + '</td>';
            resultados += '<td>' + solicitud[i].fecha_solicitud + '</td>';
            resultados += '<td>' + solicitud[i].id_problemas + '</td>';
            <?php if ($_SESSION['rol'] == null || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) { ?>
                resultados += '<td>' +
                    "<a href='index.php?c=solicitudtecnico&a=editar&id=" + solicitud[i].id_solicitud +
                    "' " + "class='btn btn-primary'><i class='fas fa-marker'></i></a>"
            <?php } ?>
            <?php if ($_SESSION['rol'] == 3) { ?>
                resultados += "<a href='index.php?c=solicitudtecnico&a=eliminar&id=" + solicitud[i].id_solicitud + "'" +
                    "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + solicitud[i].nombre +
                    " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
                resultados += '</tr>';
            <?php } ?>
        }
        tbody.innerHTML = resultados;
    }
</script>

<?php require_once FOOTER ?>
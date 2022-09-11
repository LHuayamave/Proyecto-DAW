<!--autor: Sellan Fajardo Leonardo-->
<?php $titulo = "Lista de Solicitudes tecnicos";
require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=solicitudtecnico&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>     
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
                    <th>Editar / Borrar</th>
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
                        <td>
                            <a class="btn btn-primary" href="index.php?c=solicitudtecnico&f=view_edit&id=<?php echo  $fila['id_solicitud']; ?>">
                                <i class="fas fa-marker"></i></a>
                            </a>
                            <a class="btn btn-danger" onclick="if(!confirm('Desea eliminar esta solicitud?'))return false;
                                " href="index.php?c=solicitudtecnico&f=delete&id=<?php echo  $fila['id_solicitud']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br/><br/>
            <a href="insertar.php" id="agregar">Agregar solicitud tecnico</a>
        </div>
</div>
<?php  require_once FOOTER ?>
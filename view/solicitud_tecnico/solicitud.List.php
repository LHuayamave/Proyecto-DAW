<!--autor: Sellan Fajardo Leonardo-->
<?php require_once HEADER; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
        <meta name="author" content="Sellan Fajardo Leonardo">
        <title>Consultar solicitudes tecnicos</title>
        <style>
            
        </style>
    </head>
    <body>

        <form action="index.php?c=productos&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>     

    <div>
        <table>
            <thead id="cabecera">
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Fecha Solicitud</th>
                    <th>Id problema</th>
                </tr>
            </thead>
            <tbody>
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
                            <a href="eliminar.php?id=<?php echo $fila['id'] ?>">
                                <img src="../imagenes/eliminar.png" width="20px" height="20px" alt="eliminar"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br/><br/>
            <a href="insertar.php" id="agregar">Agregar solicitud tecnico</a>
        </div>
    </body>
</html>
<?php  require_once FOOTER ?>
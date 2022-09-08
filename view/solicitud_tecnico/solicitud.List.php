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

        <?php
        $titulo="Lista de solicitudes de tecnicos";
        include_once '../plantillas/encabezado.php';
 
    require_once '../conexion.php';

    $sql = "select * from solicitud_tecnico ";
    $stmt = $pdo->prepare($sql); // preparar la sentencia
    $stmt->execute(); // ejecutar la sentencia
    ?>

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
                $filas = $stmt->fetchAll(PDO::FETCH_ASSOC); // recuperar resultados
                foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['nombres'] ?></td>
                        <td><?php echo $fila['apellido'] ?></td>
                        <td><?php echo $fila['problema_presentado'] ?></td>
                        <td><?php echo $fila['recibir_correo'] ?></td>
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
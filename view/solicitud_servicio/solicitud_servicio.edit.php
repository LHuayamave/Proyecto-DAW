<!--autor: Palacios Avila Ariel-->
<?php
$link = "index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion = "Salir";
$titulo = "Editar Solicitud";
require_once HEADER; ?>

<?php

$idError = $nombreError = $correoError = $telefonoError = $direccionError = $descripcionError = $fechaError = $tipoError = "";
$nombre = $correo = $direccion = $descripcion = $fecha = $tipoS = "";
$id = 0;
$telefono = 0;
$valido = true;


if (empty($_POST["id"])) {
    $idError = "<br /> id es requerido <br />";
    $valido = false;
} else {
    $id = test_input($_POST["id"]);
    if (!preg_match("/^[0-9]{3}$/g", $id)) {
        $idError = "Solo números de 3 dígitos";
        $valido = false;
    }
}

if (empty($_POST["nombre"])) {
    $nombreError = "<br /> Nombre es requerido <br />";
    $valido = false;
} else {
    $nombre = test_input($_POST["nombre"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
        $nombreError = "Solo letras y espacio en blanco";
        $valido = false;
    }
}

if (empty($_POST["correo"])) {
    $correoError = "<br /> Correo es requerido <br />  ";
    $valido = false;
} else {
    $correo = test_input($_POST["correo"]);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
        $correoError = "<br/>Correo electronico invalido<br/>";
        $valido = false;
    }
}

if (empty($_POST["telefono"])) {
    $telefonoError = "<br /> Telefono es requerido <br/>";
    $valido = false;
} else {
    $telefono = test_input($_POST["telefono"]);
    if (!preg_match("/^[0-9]{10}$/g", $telefono)) {
        $telefonoError = "Solo números de 10 dígitos";
        $valido = false;
    }
}

if (empty($_POST["direccion"])) {
    $direccionError = "<br /> direccion es requerida <br />";
    $valido = false;
} else {
    $direccion = test_input($_POST["direccion"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $direccion)) {
        $direccionError = "Solo letras y espacio en blanco";
        $valido = false;
    }
}

if (empty($_POST["descripcion"])) {
    $descripcionError = "<br /> descripcion es requerida <br />";
    $valido = false;
} else {
    $descripcion = test_input($_POST["descripcion"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $descripcion)) {
        $direccionError = "Solo letras y espacio en blanco";
        $valido = false;
    }
}

if (empty($_POST["fecha"])) {
    $fechaError = "<br /> fecha es requerida <br />";
    $valido = false;
} else {
    $fecha = test_input($_POST["fecha"]);
}

if (empty($_POST["tipo_servicio"])) {
    $tipoError = "<br />Debe seleccionar un tipo de Servicio <br />";
    $valido = false;
} else {
    $tipoS = test_input($_POST["tipo_servicio"]);
    $valido = true;
}




function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=SolicitudServicio&f=edit" method="POST" name="formSoliNuevo" id="formSoliNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Id Solicitud</label>
                    <input type="text" name="id" id="id" value="<?php echo $soli['id_solicitud']; ?>" readonly />
                </div>
                <div class="form-group col-sm-6">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $soli['nombre']; ?>" class=" " placeholder="Nombre" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" value="<?php echo $soli['correo']; ?>" class=" " placeholder="Correo" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $soli['telefono']; ?>" class=" " placeholder="telefono proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $soli['direccion']; ?>" class=" " placeholder="Direccion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $soli['descripcion']; ?>" class=" " placeholder="Descripcion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Solicitud</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $soli['fecha_solicitud']; ?>" class=" " placeholder="fecha contrato proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Tipo de Servicio</label>
                    <select id="tipo_servicio" name="tipo_servicio" class=" ">
                        <?php foreach ($tipo as $tipoServicio) {
                            $selected = '';
                            if ($tipoServicio->id_tipo == $soli['id_tipo']) {
                                $selected = 'selected="selected"';
                            }
                        ?>
                            <option value="<?php echo $tipoServicio->id_tipo ?>" <?php echo $selected; ?>>
                                <?php echo $tipoServicio->tipo_servicio; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('¿Esta seguro de modificar la Solicitud?')) return false;">Guardar</button>
                    <a href="index.php?c=SolicitudServicio&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>
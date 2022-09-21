<!--autor: Sellan Fajardo Leonardo-->
<?php $titulo = "Ingresar Solicitud para un tecnico";
require_once HEADER; ?>
<!---------------------INICIO VALIDACIONES POST---------------------->
<?php
// define variables establece valores vacios
$nombreError = $apellidoError = $correoError =  $fechaError = $tipoProblemaError = ""; // variables para errores
$nombre = $apellido = $correo = $fecha = $problemas_select = ""; // variables para datos
$id = 0;
$telefono = 0; // variable para datos entero
$valido = true;


// validaciones de nombre
if (empty($_POST["nombre"])) {
    $nombreError = "<br/> nombre es requerido <br/>";
    $valido = false;
} else {
    $nombre = test_input($_POST["nombre"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
        $nombreError = "Solo letras y espacio en blanco";
        $valido = false;
    }
}

// validaciones de apellido
if (empty($_POST["apellido"])) {
    $$apellidoError = "<br/> Apellido es requerido <br/>";
    $valido = false;
} else {
    $apellido = test_input($_POST["apellido"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $apellido)) {
        $$apellidoError = "Solo letras y espacio en blanco";
        $valido = false;
    }
}

// validaciones de correo
if(empty($_POST["correo"])) {
	$correoError = "<br/> correo electronico es requerio <br/>";
	$valido = false;
} else {
	$correo = test_input($_POST["correo"]);
	if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
		$correoError = "<br/>Correo electronico invalido<br/>";
		$valido = false;
	}
}

// validaciones de fecha
if (empty($_POST["fecha"])) {
    $fechaError = "<br>Debe seleccionar una fecha <br/>";
    $valido = false;
} else {
    $fecha = test_input($_POST["fecha"]);
}

// validaciones de tipo de problema
if (empty($_POST["problemas"])) {
    $tipoProblemaError = "<br>Debe seleccionar un problema en su automovil <br/>";
    $valido = false;
} else {
    $problemas_select  = test_input($_POST["problemas"]);
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
<!------------------FIN VALIDACIONES POST----------------------->

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=solicitudtecnico&f=new" method="POST" name="formSoliNuevo" id="formSoliNuevo">
            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Ej: isabel@gmail.com">
                </div>

                <div class="form-group col-sm-6">
                    <label>Fecha de solicitud</label>
                    <input type="date" name="fecha_solicitud" id="fecha" />
                </div>
                <div class="form-group col-sm-6">
                    <label for="problemas">Problema presentado</label>
                    <select id="problemas" name="problemas" class=" ">
                        <?php foreach ($problemas as $medio) {
                        ?>
                            <option value="<?php echo $medio->id_problemas ?>">
                                <?php echo $medio->nombre_problema; ?>
                            </option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=solicitudtecnico&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>


    </div>
</div>
<script>
    var form = document.getElementById("formSoliNuevo");
    form.addEventListener('submit', validar);

    function validar(event) {
        // variable para retornar
        var valido = true;
        
        // obtencion de los elementos a validar
        var txtNombre = document.getElementById("nombre");
        var txtApellido = document.getElementById("apellido");

        var txtemail = document.getElementById("correo");

        
        var txtfecha = document.getElementById("fecha");
        var selectProblema = document.getElementById("problemas");


        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        

        limpiarMensajes();

        //validacion para nombres
        if (txtNombre.value === "") {
            valido = false;
            mensaje("Debe ingresar los Nombres", txtNombre);
        } else if (!letra.test(txtNombre.value)) {
            valido = false;
            mensaje("Nombre solo debe contener letras", txtNombre);
        } else if (txtNombre.value.length > 20) {
            valido = false;
            mensaje("Nombre maximo 20 caracteres", txtNombre);
        }

        //validacion para Apellido
        if (txtApellido.value === "") {
            valido = false;
            mensaje("Debe ingresar los Apellidos", txtApellido);
        } else if (!letra.test(txtApellido.value)) {
            valido = false;
            mensaje("El Apellido solo debe contener letras", txtApellido);
        } else if (txtApellido.value.length > 20) {
            valido = false;
            mensaje("Apellido maximo 20 caracteres", txtApellido);
        }

        //validacion email
        if (txtemail.value === "") {
            valido = false;
            mensaje("Debe ingresar un correo", txtemail);
        } else if (!correo.test(txtemail.value)) {
            valido = false;
            mensaje("Correo no es correcto", txtemail);
        }


        // validacion de fecha
        var dato = txtfecha.value;
        var fechaN = new Date(dato);
        var anioN = fechaN.getFullYear();

        var fechaActual = new Date();
        var anioA = fechaActual.getFullYear();
        if (fechaN > fechaActual) {
            valido = false;
            mensaje("Fecha no puede ser superior a la actual", txtfecha);
        } else if (anioN < 2010) {
            valido = false;
            mensaje("Anio de cotizacion no puede ser menor a 2010", txtfecha);
        } else if (dato === "") {
            valido = false;
            mensaje("Debe seleccionar fecha", txtfecha);
        }

        if (!valido) {
            event.preventDefault();
        }

        //validacion problema
        if (selectProblema.value === null || selectProblema.value === '0') {
            valido = false;
            mensaje("Debe seleccionar un tipo problema automotriz", selectProblema);
        }

    }

    function mensaje(cadenaMensaje, elemento) {
        elemento.focus();

        var nodoMensaje = document.createElement("span");
        nodoMensaje.textContent = cadenaMensaje;
        nodoMensaje.setAttribute("class", "alert alert-danger d-flex align-items-center");


        var nodoPadre = elemento.parentNode;
        nodoPadre.appendChild(nodoMensaje);

    }

    function limpiarMensajes() {
        var mensajes = document.querySelectorAll("span");
        for (let i = 0; i < mensajes.length; i++) {
            mensajes[i].remove();

        }
    }
</script>
<?php require_once FOOTER; ?>
<!--autor: Nieves Pincay Kenia-->
<?php $link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion ="&nbsp;Salir";
$titulo = "Ingresar Proveedor";
require_once HEADER; ?>

<!---------------------INICIO PRUEBA POST VALIDACIONES---------------------->
<?php
	// define variables establece valores vacios
	$idError = $nombreError = $direccionError = $telefonoError = $fechaError = $medioPagoError = "";// variables para errores
	$nombre = $direccion = $fecha = $medioPago ="";// variables para datos
	$id = 0;
	$telefono = 0; // variable para datos entero
	$valido = true;

    // validaciones de id
    if (empty($_POST["id"])) {
		$idError = "<br/> id es requerido <br/>";
		$valido = false;
    } else { 
		$id = test_input($_POST["id"]);
		if (!preg_match("/^[0-9]{3}$/g", $id)) {
			$idError = "Solo números de 3 dígitos";
			$valido = false;
		}
    }

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

    // validaciones de direccion
    if (empty($_POST["direccion"])) { 
        $direccionError = "<br/> direccion es requerida <br/>";
        $valido = false;
    } else { 
        $direccion = test_input($_POST["direccion"]); 
        if (!preg_match("/^[a-zA-Z-' ]*$/", $direccion)) {
        $direccionError = "Solo letras y espacio en blanco";
        $valido = false;
        }
    }

    // validaciones de telefono
    if (empty($_POST["telefono"])) { 
        $telefonoError = "<br/> telefono es requerido <br/>";
        $valido = false;
	} else { 
		$telefono = test_input($_POST["telefono"]);
		if (!preg_match("/^[0-9]{10}$/g", $telefono)) {
			$telefonoError = "Solo números de 10 dígitos";
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

	// validaciones de medio de pago
    if (empty($_POST["medioPago"])) {
		$medioPagoError = "<br>Debe seleccionar un método de Pago <br/>";
		$valido = false;
    } else {
		$medioPago  = test_input($_POST["medioPago"]);
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
    <div class="card card-body" class="elemento">
        <form action="index.php?c=proveedores&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="codigo del proveedor" autofocus="" value="<?php echo $id ?>"/>
            		<span></span>
					<span class="error"><?php echo $idError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre proveedor" value="<?php echo $nombre ?>"/>
					<span></span>
					<span class="error"><?php echo $nombreError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion proveedor" value="<?php echo $direccion ?>"/>
					<span></span>
					<span class="error"><?php echo $direccionError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono proveedor" value="<?php echo $telefono ?>"/>
					<span></span>
					<span class="error"><?php echo $telefonoError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label>Fecha de Contrato:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha ?>"/>
                    <span></span>
					<span class="error"><?php echo $fechaError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class="form-control"> 
                        <?php foreach ($prove as $medio) {
                        ?>
                            <option value="<?php echo $medio->id_medio_pago ?>">
                                <?php echo $medio->nombre_medio; ?>
                            </option>

                        <?php
                        }
                        ?> 

                    </select>
					<span></span>
					<span class="error"><?php echo $medioPagoError; ?></span>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" name="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    var form = document.getElementById('formProvNuevo')
    const id = document.getElementById('id')
    const nombre = document.getElementById('nombre')
    const direccion = document.getElementById('direccion')
    const telefono = document.getElementById('telefono')
	const fecha = document.getElementById('fecha')
	const medioPago = document.getElementById('medioPago')

    form.addEventListener('submit', validaCampos);
    
    function validaCampos(event){
        //capturar los valores ingresados por el usuario
		var valido = true;
        const idValor = id.value.trim()
        const nombreValor = nombre.value.trim()
        const direccionValor = direccion.value.trim()
        const telefonoValor = telefono.value.trim();
		const fechaValor = fecha.value.trim();
		const medioPagoValor = medioPago.value.trim();
     
		var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
		var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
		var idreg = /^[0-9]{3}$/g; // para validar datos que deben tener 3 numeros


		//validacion id
		if (!idValor) {
			valido = false;
			validaFalla(id, 'Campo vacío')
		} else if (!idreg.test(idValor)) {
			valido = false;
			validaFalla(id, 'Id debe contener 3 dígitos')
		}else{
			valido = true;
            validaOk(id)
        }

		//validacion para nombres
		if (!nombreValor) {
			valido = false;
			validaFalla(nombre, 'Campo vacío')
		} else if (!letra.test(nombreValor)) {
			valido = false;
			validaFalla(nombre, 'Nombre solo debe contener letras')
		}else{
			valido = true;
            validaOk(nombre)
        }

		//validacion para direccion
		if (!direccionValor) {
			valido = false;
			validaFalla(direccion, 'Campo vacío')
		} else if (!letra.test(direccionValor)) {
			valido = false;
			validaFalla(direccion, 'Direccion solo debe contener letras')
		}else{
			valido = true;
            validaOk(direccion)
        }

		//validacion telefono
		if (!telefonoValor) {
			valido = false;
			validaFalla(telefono, 'Campo vacío')
		} else if (!telefonoreg.test(telefonoValor)) {
			valido = false;
			validaFalla(telefono, 'Telefono debe contener 10 digitos')
		}else{
			valido = true;
            validaOk(telefono)
        }

		// validacion de fecha
		var dato = fecha.value;
		var fechaN = new Date(dato);
		var anioN = fechaN.getFullYear();

		var fechaActual = new Date();
		var anioA = fechaActual.getFullYear();
		if (fechaN > fechaActual) {
			valido = false;
			validaFalla(fecha, 'Fecha no puede ser superior a la actual')

		} else if (anioN < 2010) {
			valido = false;
			validaFalla(fecha, 'Anio de cotizacion no puede ser menor a 2010')
			
		} else if (!fechaValor) {
			valido = false;
			validaFalla(fecha, 'Campo vacío')
			
		}else{
			valido = true;
            validaOk(fecha)
        }

		if (!valido) {
			event.preventDefault();
		}

    }

    const validaFalla = (input, msje) => {
        const formControl = input.parentElement
        const aviso = formControl.querySelector('span')
        aviso.innerText = msje

        formControl.className = 'form-group col-sm-6 form-cont falla'
    }
    const validaOk = (input, msje) => {
        const formControl = input.parentElement
        formControl.className = 'form-group col-sm-6 form-cont ok'
    }

</script>

<?php require_once FOOTER; ?>
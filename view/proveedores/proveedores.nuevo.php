<!--autor: Nieves Pincay Kenia-->
<?php $link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion ="&nbsp;Salir";
$titulo = "Ingresar Proveedor";
require_once HEADER; ?>

<!---------------------INICIO PRUEBA POST VALIDACIONES----------------------

<------------------FIN PRUEBA POST VALIDACIONES----------------------->





<div class="container">
    <div class="card card-body" class="elemento">
        <form action="index.php?c=proveedores&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="codigo del proveedor" autofocus="" />
            
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre proveedor" />
                
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion proveedor" />
                  
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono proveedor" />
                   
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label>Fecha de Contrato:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" />
                    
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
                  
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>


<script>
	var form = document.getElementById("formProvNuevo");
	form.addEventListener('submit', validar);

	function validar(event) {
		// variable para retornar
		var valido = true;
		// obtencion de los elementos a validar
		var txtId = document.getElementById("id");
		var txtNombre = document.getElementById("nombre");
		var txtTelefono = document.getElementById("telefono");
		var txtDireccion = document.getElementById("direccion");
		var txtfecha = document.getElementById("fecha");
		var selectMedioPago= document.getElementById("medioPago");


		var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
		var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
		var idreg = /^[0-9]{3}$/g; // para validar datos que deben tener 3 numeros

		limpiarMensajes();

		//validacion id
		if (txtId.value === "") {
			valido = false;
			mensaje("Debe ingresar un id", txtId);
		} else if (!idreg.test(txtId.value)) {
			valido = false;
			mensaje("Id debe contener 3 digitos", txtId);
		}

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

		//validacion telefono
		if (txtTelefono.value === "") {
			valido = false;
			mensaje("Debe ingresar un teléfono", txtTelefono);
		} else if (!telefonoreg.test(txtTelefono.value)) {
			valido = false;
			mensaje("Telefono debe ser de 10 digitos", txtTelefono);
		}


		// validar dirección
		if (txtDireccion.value === "") {
			valido = false;
			mensaje("Debe ingresar una dirección", txtDireccion);
		} else if (!letra.test(txtDireccion.value)) {
			valido = false;
			mensaje("Dirección solo debe contener letras", txtDireccion);
		} else if (txtDireccion.value.length > 20) {
			valido = false;
			mensaje("Nombre maximo 20 caracteres", txtDireccion);
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

		//validacion de medio pago
		if (selectMedioPago.value === null || selectMedioPago.value === '0') {
			valido = false;
			mensaje("Debe seleccionar un medio de pago", selectMedioPago);
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
<!--autor: Aguirre Aguirre Ronaldo-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=cotizacion&f=new" method="POST" name="formCotNuevo" id="formCotNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">Id</label>
                    <input type="text"  name="id" id="id" class="form-control" placeholder="id" autofocus=""/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre">
                </div>
                <div class="form-group col-sm-6">
                    <label for="correo">Correo electronico</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="correo">
                </div>
                <div class="form-group col-sm-6">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono">
                </div>
                <div class="form-group col-sm-6">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion">
                </div>
                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion">
                </div>
                <div class="form-group col-sm-3">
                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" name="presupuesto" id="presupuesto" class="form-control" placeholder="presupuesto">
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Cotizacion:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" />
                </div>
                <div class="form-group col-sm-3">
                    <label> Tipo de Producto: </label>
                    <select id="tipo_producto" name="tipo_producto" class="form-control">
                        <?php foreach ($tipoProductos as $tipoProducto) {
                        ?>
                            <option value="<?php echo $tipoProducto->id_tipo ?>">
                                <?php echo $tipoProducto->tipo_producto; ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=cotizacion&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>  
        </form>
    </div>
</div>

<script>
    var form = document.getElementById("formCotNuevo");
    form.addEventListener('submit', validar);

    function validar(event) {
			// variable para retornar
			var valido = true;
			// obtencion de los elementos a validar
			var txtId = document.getElementById("id");
			var txtNombre = document.getElementById("nombre");
            var txtemail = document.getElementById("correo");
			var txtTelefono = document.getElementById("telefono");
			var txtDireccion = document.getElementById("direccion");
			var txtDescripcion = document.getElementById("descripcion");
            var txtPresupuesto = document.getElementById("presupuesto");
            var txtfecha = document.getElementById("fecha");
			var selectProducto = document.getElementById("tipo_producto");


			var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
			var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
            var idreg = /^[0-9]$/g; // para validar datos que deben tener 4 numeros

            limpiarMensajes();

            //validacion id
            if (txtId.value === "") {
				valido = false;
				mensaje("Debe ingresar un id", txtId);
			} else if (!idreg.test(txtId.value) >= 4) {
				valido = false;
				mensaje("Id solo puede contener 4 digitos", txtId);
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

            //validacion email
			if (txtemail.value === "") {
				valido = false;
				mensaje("Debe ingresar un correo", txtemail);
			} else if (!correo.test(txtemail.value)) {
				valido = false;
				mensaje("Correo no es correcto", txtemail);
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

			//validacion descripcion
            if (txtDescripcion.value === "") {
				valido = false;
				mensaje("Debe ingresar una descripcion", txtDescripcion);
			} else if (!letra.test(txtDescripcion.value)) {
				valido = false;
				mensaje("Descripcion solo debe contener letras", txtDescripcion);
			} else if (txtDescripcion.value.length > 60) {
				valido = false;
				mensaje("Descripcion maximo 60 caracteres", txtDescripcion);
			}

            //validacion presupuesto
			if (txtPresupuesto.value === "") {
				valido = false;
				mensaje("Debe ingresar un presupuesto", txtPresupuesto);
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
			} 
			else if (dato === "") {
				valido = false;
				mensaje("Debe seleccionar fecha", txtfecha);
			}

			if (!valido) {
				event.preventDefault();
			}

			//validacion cargo
			if (selectProducto.value === null || selectProducto.value === '0') {
				valido = false;
				mensaje("Debe seleccionar un tipo de producto", selectProducto);
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
<!--autor: Palacios Avila Ariel-->
<?php $titulo = "Ingresar una nueva Solicitud";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=SolicitudServicio&f=new" method="POST" name="formSoliNuevo" id="formSoliNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Id Solicitud</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="Id de la solicitud" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group col-sm-6">
                    <label>Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion de la Solicitud" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Solicitud:</label>
                    <input type="date" name="fecha_solicitud" id="fecha_solicitud" class=" " />
                </div>
                <div class="form-group col-sm-6">
                    <label> Tipo de Servicio: </label>
                    <select id="tipo_servicio" name="tipo_servicio" class=" ">
                        <?php foreach ($tipo as $tipoServicio) {
                        ?>
                            <option value="<?php echo $tipoServicio->id_tipo ?>">
                                <?php echo $tipoServicio->tipo_servicio; ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=SolicitudServicio&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>
        </form>


    </div>
</div>

<script type="text/javascript">
    var form = document.getElementById("formSoliNuevo");
    form.addEventListener("submit", validar);

    function validar(event) {
        var valido = true;
        var txtId = document.getElementById("id");
        var txtNombre = document.getElementById("nombre");
        var txtCorreo = document.getElementById("correo");
        var txtTelefono = document.getElementById("telefono");
        var txtDireccion = document.getElementById("direccion");
        var txtDescripcion = document.getElementById("descripcion");
        var txtFechaSolicitud = document.getElementById("fecha_solicitud");
        var selectTipo = document.getElementById("tipo_servicio");

        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$
        var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
        var idreg = /^[0-9]$/g; // para validar datos que deben tener 4 numeros

        limpiarMensajes();

        if (txtId.value === "") {
            valido = false;
            mensaje("Debe ingresar un id", txtId);
        } else if (!idreg.test(txtId.value) >= 4) {
            valido = false;
            mensaje("Id solo puede contener 4 digitos", txtId);
        }

        if (txtNombre.value === "") {
            valido = false;
            mensaje("Debe ingresar un nombre", txtNombre);
        } else if (!letra.test(txtNombre.value)) {
            valido = false;
            mensaje("El nombre solo debe contener letras", txtNombre);
        } else if (txtNombre.value.length > 20) {
            valido = false;
            mensaje("Nombre maximo 20 caracteres", txtNombre);
        }

        if (txtCorreo.value === "") {
            valido = false;
            mensaje("Debe ingresar un correo", txtCorreo);
        } else if (!correo.test(txtCorreo.value)) {
            valido = false;
            mensaje("Correo no es correcto", txtCorreo);
        }

        if (txtTelefono.value === "") {
            valido = false;
            mensaje("Debe ingresar un telefono", txtTelefono);
        } else if (!telefonoreg.test(txtTelefono.value)) {
            valido = false;
            mensaje("Telefono debe contener 10 digitos", txtTelefono);
        }

        if (txtDireccion.value === "") {
            valido = false;
            mensaje("Debe ingresar un direccion", txtDireccion);
        } else if (!letra.test(txtDireccion.value)) {
            valido = false;
            mensaje("Direccion solo debe contener letras", txtDireccion);
        } else if (txtDireccion.value.length > 50) {
            valido = false;
            mensaje("Direccion maxima de 50 caracteres", txtDireccion);
        }

        if (txtDireccion.value === "") {
            valido = false;
            mensaje("Debe ingresar una descripccion", txtDescripcion);
        } else if (!letra.test(txtDescripcion.value)) {
            valido = false;
            mensaje("Descripcion solo debe contener letras", txtDescripcion);
        } else if (txtDescripcion.value.length > 70) {
            valido = false;
            mensaje("Descripcion maxima de 70 caracteres", txtDescripcion);
        }

        var dato = txtFechaSolicitud.value;
        var fechaN = new Date(dato);
        var anioN = fechaN.getFullYear();

        var fechaActual = new Date();
        var anioA = fechaActual.getFullYear();
        if (fechaN > fechaActual) {
            valido = false;
            mensaje("Fecha no puede ser superior a la actual", txtfecha);
        } else if (anioN < 2022) {
            valido = false;
            mensaje("Anio no puede ser menor a 2022", txtfecha);
        } else if (dato === "") {
            valido = false;
            mensaje("Debe ingresar una fecha", txtfecha);
        }

        if (!valido) {
            event.preventDefault();
        }

        if (selectTipo.value === "" || selectTipo.value === '0') {
            valido = false;
            mensaje("Debe seleccionar un tipo de servicio", txtdecha);
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
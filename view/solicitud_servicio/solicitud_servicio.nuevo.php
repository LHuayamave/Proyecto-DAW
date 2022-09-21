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
    const id = document.getElementById("id");
    const nombre = document.getElementById("nombre");
    const correo = document.getElementById("correo");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    const descripcion = document.getElementById("descripcion");
    const fecha = document.getElementById("fecha_solicitud");
    const tipo = document.getElementById("tipo_servicio");

    form.addEventListener("submit", validarCampos);

    function validarCampos(event) {
        var valido = true;
        const idValor = id.value.trim();
        const nombreValor = nombre.value.trim();
        const correoValor = correo.value.trim();
        const telefonoValor = telefono.value.trim();
        const direccionValor = direccion.value.trim();
        const descripcionValor = descripcion.value.trim();
        const fechaSolicitudValor = fecha.value.trim();
        const tipoValor = tipo.value.trim();

        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$
        var correoreg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
        var idreg = /^[0-9]{2}$/g; // para validar datos que deben tener 4 numeros

        if (!idValor) {
            valido = false;
            validaFalla(id, 'Campo vacio');
        } else if (!idreg.test(idValor)) {
            valido = false;
            validaFalla(id, 'Id debe contener 2 dígitos');
        } else {
            valido = true;
            validaOk(id);
        }

        if (!nombreValor) {
            valido = false;
            validaFalla(nombre, 'Campo vacio');
        } else if (!letra.test(nombreValor)) {
            valido = false;
            validaFalla(nombre, 'Nombre debe contener solo letras');
        } else {
            valido = true;
            validaOk(nombre);
        }

        if (!correoValor) {
            valido = false;
            validaFalla(correo, 'Campo vacio');
        } else if (!correoreg.test(correoValor)) {
            valido = false;
            validaFalla(correo, 'Ingrese el correo de manera correcta');
        } else {
            valido = true;
            validaOk(correo);
        }

        if (!telefonoValor) {
            valido = false;
            validaFalla(telefono, 'Campo vacio');
        } else if (!telefonoreg.test(telefonoValor)) {
            valido = false;
            validaFalla(telefono, 'Telefono debe contener 10 digitos')
        } else {
            valido = true;
            validaOk(telefono);
        }

        if (!direccionValor) {
            valido = false;
            validaFalla(direccion, 'Campo vacio');
        } else if (!letra.test(direccionValor)) {
            valido = false;
            validaFalla(direccion, 'La direccion debe contener letras');
        } else {
            valido = true;
            validaOk(direccion);
        }

        if (!descripcionValor) {
            valido = false;
            validaFalla(descripcion, 'Campo vacio');
        } else if (!letra.test(descripcionValor)) {
            valido = false;
            validaFalla(descripcion, 'La descripcion debe contener letras');
        } else {
            valido = true;
            validaOk(descripcion);
        }

        var dato = fecha.value;
        var fechaN = new Date(dato);
        var anioN = fechaN.getFullYear();

        var fechaActual = new Date();
        var anioA = fechaActual.getFullYear();
        if (fechaN > fechaActual) {
            valido = false;
            validaFalla(fecha, 'Fecha no puede ser superior a la actual');
        } else if (anioN < 2022) {
            valido = false;
            validaFalla(fecha, 'Anio de la solicitud no puede ser menor a 2022');
        } else if (!fechaSolicitudValor) {
            valido = false;
            validaFalla(fecha, 'Campo vacio');
        } else {
            valido = true;
            validaOk(fecha);
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
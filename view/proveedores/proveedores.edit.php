<!--autor: Nieves Pincay Kenia-->
<?php 
$link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion ="&nbsp;Salir";
$titulo = "Editar Proveedor";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=proveedores&f=edit" method="POST" name="formProvNuevo" id="formProvNuevo">  
        <div class="form-row">
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="nombre">Id</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $prov['id_proveedor']; ?>"readonly/>
                </div>  
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prov['nombre_proveedor']; ?>" class="form-control" placeholder="nombre proveedor">
                    <span></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prov['direccion']; ?>" class="form-control" placeholder="direccion proveedor">
                    <span></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prov['telefono']; ?>" class="form-control" placeholder="telefono proveedor">
                    <span></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="fecha">Fecha Contrato</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prov['fecha_contrato']; ?>" class="form-control" placeholder="fecha contrato proveedor">
                    <span></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class="form-control">
                        <?php foreach ($prove as $medio) {
                            $selected='';
                            if($medio->id_medio_pago == $prov['id_medio_pago']){
                                $selected='selected="selected"';
                            }
                        ?>
                            <option value="<?php echo $medio->id_medio_pago ?>" <?php echo $selected; ?>>
                            <?php echo $medio->nombre_medio; ?>
                            </option>
                        <?php
                        }
                        ?>   

                    </select>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar el proveedor?')) return false;" >Guardar</button>
                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<script>
    var form = document.getElementById('formProvNuevo')
    const nombre = document.getElementById('nombre')
    const direccion = document.getElementById('direccion')
    const telefono = document.getElementById('telefono')
    const fecha = document.getElementById('fecha')
    const medioPago = document.getElementById('medioPago')

    form.addEventListener('submit', validaCampos);

    function validaCampos(event) {
        //capturar los valores ingresados por el usuario
        var valido = true;
        const nombreValor = nombre.value.trim()
        const direccionValor = direccion.value.trim()
        const telefonoValor = telefono.value.trim();
        const fechaValor = fecha.value.trim();
        const medioPagoValor = medioPago.value.trim();

        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros
        var idreg = /^[0-9]{3}$/g; // para validar datos que deben tener 3 numeros


        //validacion para nombres
        if (!nombreValor) {
            valido = false;
            validaFalla(nombre, 'Campo vacío')
        } else if (!letra.test(nombreValor)) {
            valido = false;
            validaFalla(nombre, 'Nombre solo debe contener letras')
        } else {
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
        } else {
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
        } else {
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

        } else {
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

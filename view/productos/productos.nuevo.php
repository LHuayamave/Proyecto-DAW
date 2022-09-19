<!--autor: Huayamave Cedeño Luis-->
<?php $titulo = "Ingresar un nuevo Producto";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=new" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Nombre del producto</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Nombre Producto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion del Producto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Stock Inicial</label>
                    <input type="text" name="stock_inicial" id="stock_inicial" class="form-control" placeholder="Stock Inicial" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Total: </label>
                    <input type="text" name="total" id="total" class="form-control" placeholder="Total" required>

                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de ingreso:</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" class=" " />
                </div>
                <div class="form-group col-sm-6">
                    <label> Tipo de Producto: </label>
                    <select id="tipo_producto" name="tipo_producto" class=" ">
                        <?php foreach ($tipo as $tipoProducto) {
                        ?>
                            <option value="<?php echo $tipoProducto->id_tipo ?>">
                                <?php echo $tipoProducto->tipo_producto; ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label>Proveedor: </label>
                    <select name="nombre_proveedor" id="nombre_proveedor" class="">
                        <?php foreach ($prov as $proveedor) {
                        ?>
                            <option value="<?php echo $proveedor->id_proveedor  ?>">
                                <?php echo $proveedor->nombre_proveedor; ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=productos&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>

            </div>
        </form>


    </div>
</div>

<script type="text/javascript">
    var form = document.getElementById("formProdNuevo");
    form.addEventListener("submit", validar);

    function validar(event) {
        var valido = true;
        var txtNombre = document.getElementById("nombre_producto");
        var txtDescripcion = document.getElementById("descripcion");
        var txtStock = document.getElementById("stock_inicial");
        var txtTotal = document.getElementById("total");
        var txtFecha = document.getElementById("fecha_ingreso");
        var selectTipo = document.getElementById("tipo_producto");
        var selectProveedor = document.getElementById("nombre_proveedor");

        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var numero = /^[0-9]*(\.?)[0-9]+$/;
        var decimal = /^\d*\.\d+$/;

        limpiarMensajes();

        if (txtNombre.value === "") {
            valido = false;
            mensaje("Debe ingresar los nombres", txtNombre);
        } else if (!letra.test(txtNombre.value)) {
            valido = false;
            mensaje("El nombre solo debe contener letras", txtNombre);
        } else if (!txtNombre.value.length > 20) {
            valido = false;
            mensaje("Nombre maximo 20 caracteres", txtNombre);
        }

        if (txtDescripcion.value === "") {
            valido = false;
            mensaje("Debe ingresar una descripcion", txtDescripcion);
        } else if (txtDescripcion.value.length > 60) {
            valido = false;
            mensaje("La descripcion debe contener un maximo de 60 caracteres", txtDescripcion);
        }

        if (txtStock.value === "") {
            valido = false;
            mensaje("Debe ingresar el stock", txtStock);
        } else if (!numero.test(txtStock.value)) {
            valido = false;
            mensaje("El stock solo debe contener numeros", txtStock);
        } else if (!txtStock.value.length > 75) {
            valido = false;
            mensaje("El stock maximo que se puede ingresar no debe ser mayor a 75", txtStock);
        }

        if (txtTotal.value === "") {
            valido = false;
            mensaje("Debe ingresar total", txtTotal);
        } else if (!decimal.test(txtTotal.value)) {
            valido = false;
            mensaje("El valor debe ser un numero decimal", txtTotal);
        }

        var dato = txtFecha.value;
        var fechaN = new Date(dato);
        var anioN = fechaN.getFullYear();

        var fechaActual = new Date();
        var anioA = fechaActual.getFullYear();

        if (fechaN > fechaActual) {
            valido = false;
            mensaje("La fecha no puede ser superior a la actual", txtFecha);
        } else if (anioN < 2020) {
            valido = false;
            mensaje("El anio de ingreso no puede ser menor a 2020", txtFecha);
        } else if (dato === "") {
            valido = false;
            mensaje("Debe seleccionar una fecha", txtFecha);
        }

        if (!valido) {
            event.preventDefault();
        }

        if (selectTipo.value === null || selectTipo.value === '0') {
            valido = false;
            mensaje("Debe seleccionar un tipo de producto", selectTipo);
        }

        if (selectProveedor.value === null || selectProveedor.value === '0') {
            valido = false;
            mensaje("Debe seleccionar un proveedor de producto", selectProveedor);
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
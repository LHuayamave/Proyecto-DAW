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
    var nombre = document.getElementById("nombre_producto");
    var descripcion = document.getElementById("descripcion");
    var stock = document.getElementById("stock_inicial");
    var total = document.getElementById("total");
    var fecha = document.getElementById("fecha_ingreso");
    var tipo = document.getElementById("tipo_producto");
    var proveedor = document.getElementById("nombre_proveedor");

    form.addEventListener("submit", validarCampos);

    function validarCampos(event) {
        var valido = true;
        const nombreValor = nombre.value.trim();
        const descripcionValor = descripcion.value.trim();
        const stockValor = stock.value.trim();
        const totalValor = total.value.trim();
        const fechaValor = fecha.value.trim();
        const tipoValor = tipo.value.trim();
        const proveedorValor = proveedor.value.trim();

        var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var numero = /^[0-9]*(\.?)[0-9]+$/;
        var decimal = /^\d*\.\d+$/;

        if (!nombreValor) {
            valido = false;
            validaFalla(nombre, 'Campo vacío');
        } else if (!letra.test(nombreValor)) {
            valido = false;
            validaFalla(nombreValor, 'Nombre solo debe contener letras');
        } else {
            valido = true;
            validaOk(nombre);
        }

        if (!descripcionValor) {
            valido = false;
            validaFalla(descripcion, 'Campo vacío');
        } else if (!letra.test(descripcionValor)) {
            valido = false;
            validaFalla(descripcion, 'La descripcion solo debe contener letras');
        } else {
            valido = true;
            validaOk(descripcion);
        }

        if (!stockValor) {
            valido = false;
            validaFalla(stock, 'Campo vacío');
        } else if (!numero.test(stockValor)) {
            valido = false;
            validaFalla(stock, 'El stock debe contener numeros');
        } else {
            valido = true;
            validaOk(stock);
        }

        if (!totalValor) {
            valido = false;
            validaFalla(total, 'Campo vacío');
        } else if (!decimal.test(totalValor)) {
            valido = false;
            validaFalla(total, 'El total debe contener numeros decimales');
        } else {
            valido = true;
            validaOk(total);
        }


        var dato = fecha.value;
        var fechaN = new Date(dato);
        var anioN = fechaN.getFullYear();

        var fechaActual = new Date();
        var anioA = fechaActual.getFullYear();
        if (fechaN > fechaActual) {
            valido = false;
            validaFalla(fecha, 'Fecha no puede ser superior a la actual');
        } else if (anioN < 2020) {
            valido = false;
            validaFalla(fecha, 'Anio de ingreso no puede ser menor a 2020');
        } else if (!fechaValor) {
            valido = false;
            validaFalla(fecha, 'Campo vacío');
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
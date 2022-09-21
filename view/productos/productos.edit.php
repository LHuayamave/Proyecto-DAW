<!--autor: Huayamave Cedeño Luis-->
<?php
$link = "index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion = "Salir";
$titulo = "Editar Producto";
require_once HEADER; ?>

<?php
$nombreError = $descripcionError = $stockError = $totalError = $fechaError = $tipoError = $proveedorError = "";
$nombre = $descripcion = $fecha = $tipoP = $provee = "";
$stock = 0;
$total = 0.0;
$valido = true;

if (empty($_POST["nombre"])) {
    $nombreError = "<br/> Nombre es requerido <br/>";
    $valido = false;
} else {
    $nombre = test_input($_POST["nombre"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
        $nombreError = "Se requieren letras y espacios en blanco";
        $valido = false;
    }
}

if (empty($_POST["descripcion"])) {
    $descripcionError = "<br/> Descripcion es requerido <br/>";
    $valido = false;
} else {
    $descripcion = test_input($_POST["descripcion"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $descripcion)) {
        $descripcionError = "Se requieren letras y espacios";
        $valido = false;
    }
}

if (empty($_POST["stock_inicial"])) {
    $stockError = "<br/> Stock inicial es requerido <br/>";
    $valido = false;
} else {
    $stock = test_input($_POST["stock_inicial"]);
    if (!preg_match("/^[0-9]*(\.?)[0-9]+$/g", $stock)) {
        $stockError = "<br/> Debe ser un valor numerico <br/>";
        $valido = false;
    }
}

if (empty($_POST["total"])) {
    $totalError = "<br/> Total es requerido <br/>";
    $valido = false;
} else {
    $total = test_input($_POST["total"]);
    if (!preg_match("/^\d*\.\d+$/", $total)) {
        $totalError = "<br/> Total debe incluir numeros decimales <br/>";
        $valido = false;
    }
}

if (empty($_POST["fecha_ingreso"])) {
    $fechaError = "<br/>Fecha es requerido <br/>";
    $valido = false;
} else {
    $fecha = test_input($_POST["fecha_ingreso"]);
}

if (empty($_POST["tipo_producto"])) {
    $tipoError = "<br/> Debe seleccionar un tipo de producto <br/>";
    $valido = false;
} else {
    $tipoP = test_input($_POST["tipo_producto"]);
}

if (empty($_POST["nombre_proveedor"])) {
    $proveedorError = "<br/> Debe seleccionar un proveedor <br/>";
    $valido = false;
} else {
    $proveedor = test_input($_POST["nombre_proveedor"]);
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
        <form action="index.php?c=productos&f=edit" method="POST" name="formProdNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Id Producto</label>
                    <input type="text" name="id" id="id" value="<?php echo $prod['id_producto']; ?>" readonly />
                    <span></span>
                </div>
                <div class="form-group col-sm-6">
                    <label>Nombre del Producto:</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $prod['nombre_producto']; ?>" class=" " placeholder="Nombre del Producto" required>
                    <span></span>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripcion&oacute;n:</label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $prod['descripcion']; ?>" class=" " placeholder="Descripcion del Producto" required>
                    <span></span>
                </div>
                <div class="form-group col-sm-6">
                    <label>Stock Inicial:</label>
                    <input type="text" name="stock_inicial" id="stock_inicial" value="<?php echo $prod['stock_inicial']; ?>" class=" " placeholder="Stock Inicial" required>
                    <span></span>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Ingres:</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $prod['fecha_ingreso']; ?>" class=" " placeholder="Fecha de Ingreso" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Total:</label>
                    <input type="text" name="total" id="total" value="<?php echo $prod['total']; ?>" class=" " placeholder="Total" required>
                    <span></span>
                </div>
                <div class=" form-group col-sm-6">
                    <label>Tipo de Producto:</label>
                    <select id="tipo_producto" name="tipo_producto" class=" ">
                        <?php foreach ($tipo as $tipoProducto) {
                            $selected = '';
                            if ($tipoProducto->id_tipo == $prov['id_tipo']) {
                                $selected = 'selected="selected"';
                            }
                        ?>
                            <option value="<?php echo $tipoProducto->id_tipo ?>" <?php echo $selected; ?>>
                                <?php echo $tipoProducto->tipo_producto; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                    <span></span>
                </div>
                <div class="form-group col-sm-12">
                    <label>Proveedor:</label>
                    <select id="nombre_proveedor" name="nombre_proveedor" class=" ">
                        <?php foreach ($prov as $proveedor) {
                            $selected = '';
                            if ($proveedor->id_proveedor == $prov['id_proveedor']) {
                                $selected = 'selected="selected"';
                            }
                        ?>
                            <option value="<?php echo $proveedor->id_proveedor ?>" <?php echo $selected; ?>>
                                <?php echo $proveedor->nombre_proveedor; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                    <span></span>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('¿Esta seguro de modificar el proveedor?')) return false;">Guardar</button>
                    <a href="index.php?c=productos&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var form = document.getElementById("formProdNuevo");
    const nombre = document.getElementById("nombre_producto");
    const descripcion = document.getElementById("descripcion");
    const stock = document.getElementById("stock_inicial");
    const total = document.getElementById("total");
    const fecha = document.getElementById("fecha_ingreso");
    const tipo = document.getElementById("tipo_producto");
    const proveedor = document.getElementById("nombre_proveedor");

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

        var letra = /^[a-z ,.'-]+$/i;
        var numero = /^[0-9]*(\.?)[0-9]+$/;
        var decimal = /^\d*\.\d+$/;

        if (!nombreValor) {
            valido = false;
            validaFalla(nombre, 'Campo vacío');
        } else if (!letra.test(nombreValor)) {
            valido = false;
            validaFalla(nombre, 'Nombre solo debe contener letras');
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
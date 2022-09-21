<!--autor: Huayamave Cedeño Luis-->
<?php 
$link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion ="Salir";
$titulo = "Editar Producto";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=edit" method="POST" name="formProdNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Id Producto</label>
                    <input type="text" name="id" id="id" value="<?php echo $prod['id_producto']; ?>" readonly />
                </div>
                <div class="form-group col-sm-6">
                    <label>Nombre del Producto:</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $prod['nombre_producto']; ?>" class=" " placeholder="Nombre del Producto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripcion&oacute;n:</label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $prod['descripcion']; ?>" class=" " placeholder="Descripcion del Producto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Stock Inicial:</label>
                    <input type="text" name="stock_inicial" id="stock_inicial" value="<?php echo $prod['stock_inicial']; ?>" class=" " placeholder="Stock Inicial" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Ingres:</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $prod['fecha_ingreso']; ?>" class=" " placeholder="Fecha de Ingreso" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Total:</label>
                    <input type="text" name="total" id="total" value="<?php echo $prod['total']; ?>" class=" " placeholder="Total" required>
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
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('¿Esta seguro de modificar el proveedor?')) return false;">Guardar</button>
                    <a href="index.php?c=productos&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>
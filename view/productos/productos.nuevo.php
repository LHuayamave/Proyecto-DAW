<!--autor: Huayamave Cedeño Luis-->
<?php $titulo = "Ingresar un nuevo Producto";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Nombre del producto</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion del producto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Stock Inicial</label>
                    <input type="text" name="stock_inicial" id="stock_inicial" class="form-control" placeholder="Stock Inicial" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de ingreso:</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" class=" " />
                </div>
                <div class="form-group col-sm-6">
                    <label>Total: </label>
                    <input type="text" name="total" id="total" class="form-control" placeholder="Total" required>

                </div>
                <div class="form-group col-sm-6">
                    <label> Tipo de Producto: </label>
                    <select id="tipo_producto" name="tipo_producto" class=" ">
                        <?php foreach ($prod as $tipo) {
                        ?>
                            <option value="<?php echo $tipo->id_tipo ?>">
                                <?php echo $tipo->tipo_producto; ?>
                            </option>

                        <?php
                        }
                        ?>
                </div>
                <div class="form-group col-sm-6">
                    <label>Proveedor: </label>
                    </select>
                    <select name="nombre_proveedor" id="nombre_proveedor" class="">
                        <?php foreach ($prod2 as $prov) {
                        ?>
                            <option value="<?php echo $prov->id_proveedor  ?>">
                                <?php echo $prov->nombre_proveedor; ?>
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

<?php require_once FOOTER; ?>
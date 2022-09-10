<!--autor: Aguirre Aguirre Ronaldo-->
<?php require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=cotizacion&f=new" method="POST" name="formCotNuevo" id="formCotNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">Id</label>
                    <input type="text"  name="id" id="id" class="form-control" placeholder="id" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="correo">Correo electronico</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="correo" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion" required>
                </div>
                <div class="form-group col-sm-3">
                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" name="presupuesto" id="presupuesto" class="form-control" placeholder="presupuesto" required>
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

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
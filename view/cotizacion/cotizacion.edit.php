<!--autor: Aguirre Aguirre Ronaldo-->
<?php $titulo = "Editar Cotizacion";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=cotizacion&f=edit" method="POST" name="formCotNuevo" id="formCotNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">Id</label>
                    <input type="text"  name="id" id="id" class="form-control" value="<?php echo $cot['id_cotizacion']; ?>"readonly placeholder="id" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $cot['nombre']; ?>" placeholder="nombre" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="correo">Correo electronico</label>
                    <input type="text" name="correo" id="correo" class="form-control" value="<?php echo $cot['correo']; ?>" placeholder="correo" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $cot['telefono']; ?>" placeholder="telefono" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $cot['direccion']; ?>" placeholder="direccion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $cot['descripcion']; ?>" placeholder="descripcion" required>
                </div>
                <div class="form-group col-sm-3">
                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" name="presupuesto" id="presupuesto" class="form-control" value="<?php echo $cot['presupuesto']; ?>" placeholder="presupuesto" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Cotizacion:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $cot['fecha_cotizacion']; ?>" />
                </div>
                <div class="form-group col-sm-3">
                    <label for="tipo_producto">Tipo de producto</label>
                    <select id="tipo_producto" name="tipo_producto" class="form-control">
                        <?php foreach ($tipoProductos as $tipoProducto) {
                            $selected='';
                            if($tipoProducto->id_tipo == $cot['id_cotizacion']){
                                $selected='selected="selected"';
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

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar la cotizacion?')) return false;" >Guardar</button>
                    <a href="index.php?c=cotizacion&f=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>
    </div>
</div>
<?php require_once FOOTER; ?>
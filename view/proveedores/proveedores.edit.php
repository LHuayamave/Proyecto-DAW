<!--autor: Nieves Pincay Kenia-->
<?php require_once HEADER; ?>

<div class="container">
    <div class=" ">
        <form action="index.php?c=proveedores&f=edit" method="POST" name="formProvNuevo" id="formProvNuevo">
        
        <input type="hidden" name="id" id="id" value="<?php echo $prov['id_proveedor']; ?>"/>
            <div class=" ">
                <div class=" ">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prov['nombre']; ?>" class=" " placeholder="nombre proveedor" required>
                </div>
                <div class=" ">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prov['direccion']; ?>" class=" " placeholder="direccion proveedor" required>
                </div>
                <div class=" ">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prov['telefono']; ?>" class=" " placeholder="telefono proveedor" required>
                </div>
                <div class=" ">
                    <label for="fecha">Fecha Contrato</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prov['fecha_contrato']; ?>" class=" " placeholder="fecha contrato proveedor" required>
                </div>
                <div class=" ">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class=" ">
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
                        onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;" >Guardar</button>
                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>

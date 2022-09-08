<!--autor: Nieves Pincay Kenia-->
<?php require_once HEADER; ?>

<div class="container">
    <div class=" ">
        <form action="index.php?c=productos&f=edit" method="POST" name="formProvNuevo" id="formProvNuevo">
        
        <input type="hidden" name="id" id="id" value="<?php echo $prod['id_proveedor']; ?>"/>
            <div class=" ">
                <div class=" ">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['nombre']; ?>" class=" " placeholder="nombre proveedor" required>
                </div>
                <div class=" ">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prod['direccion']; ?>" class=" " placeholder="direccion proveedor" required>
                </div>
                <div class=" ">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prod['telefono']; ?>" class=" " placeholder="telefono proveedor" required>
                </div>
                <div class=" ">
                    <label for="fechaContrato">Fecha Contrato</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prod['fecha_contrato']; ?>" class=" " placeholder="fecha contrato proveedor" required>
                </div>
                <div class=" ">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class=" ">
                        <?php foreach ($medioPago as $medio) {
                            $selected='';
                            if($med->id_medio_pago == $prov['id_medio_pago']){
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

                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" value="<?php echo $prod['prod_estado']?>" 
                        name="estado"  <?php echo ($prod['prod_estado'] == 1)?'checked="checked"':''; ?> >
                    
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;" >Guardar</button>
                    <a href="index.php?c=productos&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>

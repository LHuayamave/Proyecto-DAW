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
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prov['direccion']; ?>" class="form-control" placeholder="direccion proveedor">
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prov['telefono']; ?>" class="form-control" placeholder="telefono proveedor">
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="fecha">Fecha Contrato</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prov['fecha_contrato']; ?>" class="form-control" placeholder="fecha contrato proveedor">
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

<?php require_once FOOTER; ?>

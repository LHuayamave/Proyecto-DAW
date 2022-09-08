<!--autor: Nieves Pincay Kenia-->
<?php $titulo = "Ingresar Proveedor";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=proveedores&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">Id</label>
                    <input type="text"  name="id" id="id" class="form-control" placeholder="codigo del proveedor" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono proveedor" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Contrato:</label>
                    <input type="date" name="fecha" id="fecha" class=" " />
                </div>
                <div class="form-group col-sm-6">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class=" ">
                        <?php foreach ($prove as $medio) {
                            ?>
                            <option value="<?php echo $medio->id_medio_pago ?>">
                            <?php echo $medio->nombre_medio; ?>
                            </option>

                        <?php
                        }
                        ?>   

                    </select>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
                    
            </div>  
        </form>


    </div>
</div>

<?php require_once FOOTER; ?>

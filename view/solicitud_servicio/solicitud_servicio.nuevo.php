<!--autor: Palacios Avila Ariel-->
<?php $titulo = "Ingresar una nueva Solicitud";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=SolicitudServicio&f=new" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Id Solicitud</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="Id de la solicitud" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group col-sm-6">
                    <label>Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Descripci&oacute;n</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion de la Solicitud" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha de Solicitud:</label>
                    <input type="date" name="fecha_solicitud" id="fecha_solicitud" class=" " />
                </div>
                <div class="form-group col-sm-6">
                    <label> Tipo de Servicio: </label>
                    <select id="tipo_servicio" name="tipo_servicio" class=" ">
                        <?php foreach ($tipo as $tipoServicio) {
                        ?>
                            <option value="<?php echo $tipoServicio->id_tipo ?>">
                                <?php echo $tipoServicio->tipo_servicio; ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=SolicitudServicio&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>
        </form>


    </div>
</div>

<?php require_once FOOTER; ?>
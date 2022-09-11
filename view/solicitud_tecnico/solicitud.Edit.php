<!--autor: Sellan Fajardo Leonardo-->
<?php $titulo = "Editar Solicitud";
require_once HEADER; ?>

<div class="card card-body">
    <form action="index.php?c=solicitudtecnico&f=edit" method="POST" name="formProvNuevo" id="formProvNuevo">
        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="id">Id</label>
                <input type="text" name="id_solicitud" id="id" value="<?php echo $soli['id_solicitud']; ?>" readonly />
            </div>

            <div class="form-group col-sm-6">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $soli['nombre']; ?>" class=" " required>
            </div>

            <div class="form-group col-sm-6">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $soli['apellido']; ?>" class=" " required>
            </div>

            <div class="form-group col-sm-6">
                <label for="direccion">Correo</label>
                <input type="text" name="correo" id="correo" value="<?php echo $soli['correo']; ?>" class=" " placeholder="Ej: isabel@gmail.com" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="fecha">Fecha de solicitud</label>
                <input type="date" name="fecha" id="fecha" value="<?php echo $soli['fecha_solicitud']; ?>" class=" " placeholder="fecha contrato proveedor" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="problemas">Problema presentado</label>
                <select id="problemas" name="problemas" class=" ">
                    <?php foreach ($problemas as $medio) {
                        $selected = '';
                        if ($medio->nombre_problema == $prov['id_problemas']) {
                            $selected = 'selected="selected"';
                        }
                    ?>
                        <option value="<?php echo $medio->id_problemas ?>" <?php echo $selected; ?>>
                            <?php echo $medio->nombre_problema; ?>
                        </option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="form-group mx-auto">
                <button type="submit" class="btn btn-primary" onclick="if (!confirm('Desea modificar la solicitud?')) return false;">Guardar</button>
                <a href="index.php?c=solicitudtecnico&f=index" id="Btn_cancelar" class="btn btn-primary">Cancelar</a>
            </div>

        </div>
    </form>
</div>
</div>

<?php require_once FOOTER; ?>
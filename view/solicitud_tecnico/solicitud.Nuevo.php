<!--autor: Sellan Fajardo Leonardo-->
<?php $titulo = "Ingresar Solicitud para un tecnico";
require_once HEADER; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=solicitudtecnico&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="nombre">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Ej: isabel@gmail.com" required>
                </div>

                <div class="form-group col-sm-6">
                    <label>Fecha de solicitud</label>
                    <input type="date" name="fecha_solicitud" id="fecha" />
                </div>
                <div class="form-group col-sm-6">
                    <label for="problemas">Problema presentado</label>
                    <select id="problemas" name="problemas" class=" ">
                        <?php foreach ($problemas as $medio) {
                        ?>
                            <option value="<?php echo $medio->id_problemas ?>">
                                <?php echo $medio->nombre_problema; ?>
                            </option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=solicitudtecnico&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>


    </div>
</div>

<?php require_once FOOTER; ?>
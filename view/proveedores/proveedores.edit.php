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
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prov['nombre_proveedor']; ?>" class="form-control" placeholder="nombre proveedor" required>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prov['direccion']; ?>" class="form-control" placeholder="direccion proveedor" required>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prov['telefono']; ?>" class="form-control" placeholder="telefono proveedor" required>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="fecha">Fecha Contrato</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prov['fecha_contrato']; ?>" class="form-control" placeholder="fecha contrato proveedor" required>
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


<script type="text/javascript">
    window.addEventListener('load', ()=> {
    const form = document.querySelector('#formProvNuevo')
    const nombre = document.getElementById('nombre')
    const id = document.getElementById("id")
    const direccion = document.getElementById("direccion")
    const telefono = document.getElementById("telefono")
    const fechaContrato = document.getElementById("fecha")
    const medioPago = document.getElementById("medioPago")

    form.addEventListener('keyup', (e) => {
        e.preventDefault()
        validaCampos()
    })
    
    const validaCampos = ()=> {

        var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
        var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros 

        //Validar Id
        const idValor = id.value.trim()
        if(!idValor){
            validaFalla(id, 'Campo vacío')
        }else if (isNaN(idValor)) {
            validaFalla(id, 'Id debe ser numérico')
        }else {
            validaOk(id)
        } 

        //Validar nombre
        const nombreValor = nombre.value.trim()
        if(!nombreValor){
            validaFalla(nombre, 'Campo vacío')
        }else if (!letra.test(nombreValor)) { 
            validaFalla(nombre, 'Nombre solo debe contener letras')
        }else{
            validaOk(nombre)
        }   
        
        // validar dirección
        const direccionValor = direccion.value.trim()
        if (!direccionValor) {
            validaFalla(direccion, 'Campo vacío')
        } else if (!letra.test(direccionValor)) { 
            validaFalla(direccion, 'Dirección solo debe contener letras')
        }else{
            validaOk(direccion)
        }  


        //validacion telefono
        const telefonoValor = telefono.value.trim()
        if (!telefonoValor) {
            validaFalla(telefono, 'Campo vacío')
        } else if (!telefonoreg.test(telefonoValor)) {
            validaFalla(telefono, 'Teléfono solo debe contener numeros y contener 10 dígitos')
        }else{
            validaOk(telefono)
        } 


        // validacion de fecha
        const fechaValor = fechaContrato.value.trim()
        var fechaN = new Date(fechaValor);
        var anioN=fechaN.getFullYear();
        var fechaActual = new Date();
        var anioA =fechaActual.getFullYear();    
        if(fechaN > fechaActual){
            validaFalla(fechaContrato, 'Fecha no puede ser superior a la fecha actual')
        }else if(anioN < 1930){
            validaFalla(fechaContrato, 'Anio de nacimiento no puede ser menor a 1930')
        }else if(!fechaValor){
            validaFalla(fechaContrato, 'Campo vacío')
        }else{
            validaOk(fechaContrato)
        } 

    }

    const validaFalla = (input, msje) => {
        const formControl = input.parentElement
        const aviso = formControl.querySelector('span')
        aviso.innerText = msje

        formControl.className = 'form-cont falla form-group col-sm-6'
    }
    const validaOk = (input, msje) => {
        const formControl = input.parentElement
        formControl.className = 'form-cont ok form-group col-sm-6'
    }
})

</script>
<?php require_once FOOTER; ?>

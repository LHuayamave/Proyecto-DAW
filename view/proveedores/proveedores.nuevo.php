<!--autor: Nieves Pincay Kenia-->
<?php $link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/salir.png";
$opcion ="&nbsp;Salir";
$titulo = "Ingresar Proveedor";
require_once HEADER; ?>

<!---------------------INICIO PRUEBA POST VALIDACIONES----------------------
<?php
var_dump($_POST);
//var_dump($_REQUEST);

  // define variables establece valores vacios
  $idError = $nombreError = $direccionError = $telefonoError = $fechaError = $medioPagoError = "";// variables para errores
  $nombre = $direccion = $fecha = $medioPago ="";// variables para datos
  $id=0;
  $telefono =0; // variable para datos entero
  $valido = true;
    // validaciones y lectura de datos
    if (empty($_POST["id"])) { // empty retorna verdadero cuando es vacio, null o no existe
      $idError = "<br/> id es requerido <br/>";
      $valido = false;
    } else { // empty retorna false si exsite y no esta vacio
      $id = test_input($_POST["id"]); // funcion propia que limpia el dato enviado
      if (!preg_match("/^[0-9]{3}$/g", $id)) {// ejemplo validacion contra expresion regular
        $idError = "Solo números de 3 dígitos";
        $valido = false;
      }
    }

    if (empty($_POST["nPaginas"])) {
      $nPaginasErr = "El numero de paginas es requerido <br/>";
      $valido = false;
    } else {
      $nPaginas = test_input($_POST["nPaginas"]);
      if (!filter_var($nPaginas, FILTER_VALIDATE_INT)) {// ejemplo uso de filtros de validacion
        $nPaginasErr = "Formato invalido de numero <br/>";
        $valido = false;
      }
    }
     
    // validaciones y lectura de datos
    if (empty($_POST["nombre"])) { // empty retorna verdadero cuando es vacio, null o no existe
        $nombreError = "<br/> nombre es requerido <br/>";
        $valido = false;
    } else { // empty retorna false si exsite y no esta vacio
        $nombre = test_input($_POST["nombre"]); // funcion propia que limpia el dato enviado
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {// ejemplo validacion contra expresion regular
        $nombreError = "Solo letras y espacio en blanco";
        $valido = false;
        }
    }

   
    // validaciones y lectura de datos
    if (empty($_POST["direccion"])) { // empty retorna verdadero cuando es vacio, null o no existe
        $direccionError = "<br/> direccion es requerida <br/>";
        $valido = false;
    } else { // empty retorna false si exsite y no esta vacio
        $direccion = test_input($_POST["direccion"]); // funcion propia que limpia el dato enviado
        if (!preg_match("/^[a-zA-Z-' ]*$/", $direccion)) {// ejemplo validacion contra expresion regular
        $direccionError = "Solo letras y espacio en blanco";
        $valido = false;
        }
    }


    // validaciones y lectura de datos
    if (empty($_POST["telefono"])) { // empty retorna verdadero cuando es vacio, null o no existe
        $telefonoError = "<br/> telefono es requerido <br/>";
        $valido = false;
      } else { // empty retorna false si exsite y no esta vacio
        $telefono = test_input($_POST["telefono"]); // funcion propia que limpia el dato enviado
        if (!preg_match("/^[0-9]{10}$/g", $telefono)) {// ejemplo validacion contra expresion regular
          $telefonoError = "Solo números de 10 dígitos";
          $valido = false;
        }
      }



    if (empty($_POST["fecha"])) {
      $fechaError = "Debe seleccionar una fecha <br/>";
      $valido = false;
    } else {
      $fecha = test_input($_POST["fecha"]);
    }

    if (empty($_POST["medioPago"])) {
      $medioPagoError = "Debe seleccionar un método de Pago <br/>";
      $valido = false;
    } else {
      $medioPago  = test_input($_POST["medioPago"]);
    }


    if(!$valido){    
      echo "<h3 class='error'>Errores de llenado:</h3>";
     // echo  $tituloErr. $nPaginasErr . $tipoPastaErr. $encuadernacionErr ;
      echo  "$idError $nombreError  $direccionError $telefonoError $fechaError $medioPagoError" ;
    }

   if($valido){
      echo "<h3>Datos ingresados:</h3>";
      echo "ID: $id </br>";
      echo "Nombre:  $nombre <br/>";
      echo "Direccion: $direccion <br/>";
      echo "Telefono: $telefono <br/>";
      echo "Fecha: $fecha <br/>";
      echo "Medio Pago: $medioPago <br/>";

    
    //echo "<h2>La cotizacion de percio del libro 'es' $ ". $total.'</h2>';

  } // end if(valido)

  function test_input($data)
  {
    $data = trim($data); //removes whitespace both sides
    $data = stripslashes($data); //removes backslashes
    $data = htmlspecialchars($data); //converts some predefined characters to HTML entities
    return $data;
  }
  ?>


<------------------FIN PRUEBA POST VALIDACIONES----------------------->





<div class="container">
    <div class="card card-body" class="elemento">
        <form action="index.php?c=proveedores&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="codigo del proveedor" autofocus="" value="<?php echo $id ?>"/>
                    <span></span>
                    <span class="error"><?php echo $idError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre proveedor" value="<?php echo $nombre ?>"/>
                    <span></span>
                    <span class="error"><?php echo $nombreError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion proveedor" value="<?php echo $direccion ?>"/>
                    <span></span>
                    <span class="error"><?php echo $direccionError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono proveedor" value="<?php echo $telefono ?>"/>
                    <span></span>
                    <span class="error"><?php echo $telefonoError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label>Fecha de Contrato:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha ?>"/>
                    <span></span>
                    <span class="error"><?php echo $fechaError; ?></span>
                </div>
                <div class="form-group col-sm-6" class="form-cont">
                    <label for="medioPago">Medio de Pago</label>
                    <select id="medioPago" name="medioPago" class="form-control"> 
                        <?php foreach ($prove as $medio) {
                        ?>
                            <option value="<?php echo $medio->id_medio_pago ?>">
                                <?php echo $medio->nombre_medio; ?>
                            </option>

                        <?php
                        }
                        ?> 

                    </select>
                    <span></span>
                    <span class="error"><?php echo $medioPagoError; ?></span>
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
        /*var nombre = document.getElementById('nombre')
        var id = document.getElementById("id")
        var direccion = document.getElementById("direccion")
        var telefono = document.getElementById("telefono")
        var fechaContrato = document.getElementById("fecha")
        var medioPago = document.getElementById("medioPago")*/


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
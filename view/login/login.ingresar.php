<?php $fondo = "assets/imagenes/automotriz3.jpeg";
$link = "index.php?c=Login&f=index";
//$imagen = "assets/imagenes/usuarioInicio.png";
//$opcion ="Mi Cuenta";
//require_once HEADER; 
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<style>
		/*Login */
		#galeria {
			display: grid;
			grid-template-rows: auto auto auto auto auto auto;
			grid-template-columns: 16% 16% 16% 16% 16% 16%;
			grid-gap: 10px 10px;
		}

		.elemento:nth-child(1) {
			grid-row: 3/8;
			grid-column: 3/5;
		}

		.elemento {
			background-color: rgba(0, 0, 0, .8);
			box-shadow: 6px 20px 10px black;
			padding: 10px;
			width: 370px;
			margin-left: 7px;
			margin-top: 2px;
			padding-left: 30px;
			padding-right: 30px;
			padding-bottom: 50px;
			border-radius: 9px;
			margin-bottom: 50px;
		}

		.elemento2 {
			padding-bottom: 20px;

		}

		p.texto {
			font-size: 20pt;
			font-weight: lighter;
			color: darkcyan;
			font-stretch: expanded;
			text-align: center;
		}

		input[type=text],
		input[type=password] {
			width: 300px;
			height: 30px;
			border-radius: none;
		}

		input[type=submit],
		input[type=reset] {
			background-color: #2C4A64;
			color: white;
			width: 300px;
			height: 25px;
			text-align: center;
			padding-top: 5px;
			padding-bottom: 25px;
		}

		label {
			color: white;
		}

		.icono {
			width: 25px;
			height: 25px;
		}

		#form .componente {
			position: relative;
		}

		#form .componente input {
			padding-left: 30px;
			outline: none;

		}

		#form .componente img {
			position: absolute;
			margin-left: 5px;
			margin-top: 3px;

		}
	</style>
</head>

<body style="background:url(<?php echo isset($fondo) ? $fondo : ""; ?>); background-size: cover;">
	<div id="contenedorPrincipal">
		<div id="galeria">
			<div class="elemento">
				<div class="elemento2">
					<p class="texto">Inicio de Sesión</p>
				</div>


				<form action="index.php?c=login&f=validar" id="formLogin" method="POST">
					<div class="componente">
						<label>Usuario:</label><br />
						<img src="assets/imagenes/usuario.png" class="icono" />
						<input type="text" name="usuario" id="usuario" placeholder="usuario" />
					</div>
					<br />
					<div class="componente">
						<label>Contraseña:</label><br />
						<img src="assets/imagenes/contrasenia.png" class="icono" />
						<input type="password" name="contra" id="contra" placeholder="contraseña" />
					</div>
					<br />

					<br /><br />
					<div id="boton">
						<input type="submit" class="btn btn-primary" /><br /><br />
					</div>

				</form>
			</div>
		</div>
	</div>

	//validacion lado del cliente
	<script>
    var form = document.getElementById("formLogin");
    form.addEventListener('submit', validar);

    function validar(event) {
        // variable para retornar
        var valido = true;
        
        // obtencion de los elementos a validar
        var txtemail = document.getElementById("usuario");

        var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        

        limpiarMensajes();

        //validacion email
        if (txtemail.value === "") {
            valido = false;
            mensaje("Debe ingresar un correo", txtemail);
        } else if (!correo.test(txtemail.value)) {
            valido = false;
            mensaje("Correo no es correcto", txtemail);
        }

        if (!valido) {
            event.preventDefault();
        }
    }

    function mensaje(cadenaMensaje, elemento) {
        elemento.focus();

        var nodoMensaje = document.createElement("span");
        nodoMensaje.textContent = cadenaMensaje;
        nodoMensaje.setAttribute("class", "alert alert-danger d-flex align-items-center");


        var nodoPadre = elemento.parentNode;
        nodoPadre.appendChild(nodoMensaje);

    }

    function limpiarMensajes() {
        var mensajes = document.querySelectorAll("span");
        for (let i = 0; i < mensajes.length; i++) {
            mensajes[i].remove();

        }
    }
</script>
	<?php require_once FOOTER ?>
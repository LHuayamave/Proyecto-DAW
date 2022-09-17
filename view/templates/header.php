<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Automotriz</title>
    <style>
        .form-cont select{
            margin-right: 12px;
            width: 500px;
        }
        .form-cont, input:focus {
            outline: none;
        }

        .form-cont.ok input {
            border: 0.1px solid;
            border-color: #08ffc8;  
        }
        .form-cont.falla input {
            border: 0.1px solid;
            border-color: #fe5f55;
        }
        .form-cont span {
            visibility: hidden;
            position: relative;
            font-size: small;
            font-weight: 100;
            text-align: right;
        }

        .form-cont.falla span {
            visibility: visible;
            color:#e74c3c;
        }
        .error {
            color: #FF0000;
        }
        /*Login */
        #galeria{
			display: grid;
			grid-template-rows: auto auto auto auto auto auto; 
			grid-template-columns: 16% 16% 16% 16% 16% 16%;
			grid-gap: 10px 10px; 
		}
		.elemento:nth-child(1){
			grid-row: 3/8;
			grid-column: 3/5;
		}
        .elemento{
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
        .elemento2{
			padding-bottom: 20px;

        }
        p.texto{
			font-size: 20pt;
			font-weight: lighter;
			color: darkcyan;
			font-stretch: expanded;
            text-align: center;
		}
        input[type=text]{
			width: 300px;
			height: 30px;
            border-radius:none;
		}
		input[type=submit], input[type=reset]{
			background-color:#2C4A64;
			color: white;
			width: 300px;
			height: 25px;
			text-align: center;
			padding-top: 5px;
			padding-bottom: 25px;
		}
        label{
			color: white;
		}
		.icono{
			width: 25px;
			height: 25px;
		}
		#form .componente{
			position: relative;
		}
		#form .componente input{
			padding-left: 30px;
			outline: none;
			
		}

		#form .componente img{
			position: absolute;
			margin-left: 5px;
			margin-top: 3px;

		}
    </style>
</head>
<body style="background:url(<?php echo isset($fondo) ? $fondo : ""; ?>); background-size: cover;">
<div style="margin-bottom: 20px">
    <header>
        <a href=""><img src="assets/imagenes/logo3.png" alt="logo" /></a>
    </header>
    <nav style="margin-bottom: 40px">
        <div id="navegador">
            <ul>
                <li><a href="index.php?c=cotizacion&f=index">Cotizaci&oacute;n</a></li>
                <li><a href="index.php?c=Productos&f=index">Productos</a></li>
                <li><a href="index.php?c=SolicitudServicio&f=index">Solicitudes de Servicio</a></li>
                <li><a href="index.php?c=SolicitudTecnico&f=index">Tecnicos</a></li>
                <li><a href="index.php?c=Proveedores&f=index">Proveedores</a></li>
            </ul>
        </div>
    </nav>
    <h1 style="text-align:center">
        <?php echo isset($titulo) ? $titulo : ""; ?>
    </h1>
</div>

<?php
if (!isset($_SESSION)) {
    session_start();
};
if (!empty($_SESSION['mensaje'])) {
?>
    <div class="mt-2 alert alert-<?php echo $_SESSION['color']; ?>
					alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['mensaje']; ?>
    </div>
<?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['color']);
} //end if 
?>
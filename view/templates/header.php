<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <!-- FONT AWESOME -->
        <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
        crossorigin="anonymous">

        <title>Automotriz</title>
    </head> 
<div style="margin-bottom: 20px">
	<header>
		<a href="../index.html"><img src="../imagenes/logo3.png" alt="logo"/></a>
	</header> 
    <nav>
		<div id="navegador">
			<ul>
				<li><a href="">Inicio</a></li>
				<li><a href="">Cotizaci&oacute;n</a></li>
				<li><a href="">Inventario</a></li>
				<li><a href="">Solicitudes de Servicio</a></li>
				<li><a href="">Tecnicos</a></li>
				<li><a href="index.php?c=Provedores&f=index">Proveedores</a></li>
			</ul>
		</div>
	</nav>
	<h1>
        <?php echo isset($titulo)?$titulo:""; ?>
    </h1>
</div>
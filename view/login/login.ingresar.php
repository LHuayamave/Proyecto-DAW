<?php $fondo = "assets/imagenes/automotriz3.jpeg";
$link ="index.php?c=Login&f=index";
$imagen = "assets/imagenes/usuarioInicio.png";
$opcion ="Mi Cuenta";
require_once HEADER; ?>

<div id="contenedorPrincipal">
        <div id="galeria">
            <div class="elemento">
				<div class="elemento2">
					<p class="texto">Inicio de Sesión</p>
				</div>
                <form id="form">
                    <div class="componente">
                        <label>Usuario:</label><br/>
						<img src="assets/imagenes/usuario.png" class="icono"/>
                        <input type="text" name="nombres" id="nombres" placeholder="usuario" />
                    </div>
                    <br/>
                    <div class="componente">
                        <label>Contraseña:</label><br/>
						<img src="assets/imagenes/contrasenia.png" class="icono"/>
                        <input type="text" name="apellidos" id="apellidos" placeholder="contraseña"/>
                    </div>
                    <br/>
                    
                    <br/><br/>
                    <div id="boton">
                        <input type="submit" name="boton" id="enviar" class="btn btn-primary" value="Iniciar Sesión"/><br/><br/>
                    </div>
 
                </form>   
            </div>  
        </div>
    </div>

<?php require_once FOOTER ?>
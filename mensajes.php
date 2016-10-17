<?php 
	SESSION_START(); 
	
	if (!isset($_SESSION['usuario'])) {
		header('location: index.php');
	 }else{
		$usuario = $_SESSION['email'];
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Mensajes</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="icon" href="images/favicon.ico">
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>
		<input type="hidden" id="usuario" value="<?php echo $usuario?>">
		<!-- Header -->
		<?php require_once('Herramientas/cabecera.php');?>

		<!-- Main -->
			<section id="main" class="box wrapper mainmensaje">
				<nav  class="mensajes_navegador">
					<ul>
						<li><a href="#">
								<h3>Recibidos</h3>
						</a></li>
					</ul>
				</nav>
				<div class="mensajes_contenedor">
					<h3 class="subtitulo_seccion">
						Mensajes recibidos
					</h3>
					<template id='template_mensajes'>
						<div class="ofrecerlibros">					
							<div class="datosoferente">
								<div class="vendedor_foto">
									<img src="" alt="" class="foto_oferente">
								</div>
								<div class="mensaje_recibido">
									<p class="usuariomensaje"></p>
									<input type="hidden" class="emailreceptor">
									<p class="fechamensaje">
										<span class="hora"> </span> del <span class="fecha"> </span>
									</p>
									<p class="mensaje_contenido"></p>
								</div>
							</div>                       
							<div class="mensaje_botones">
									<a class="mensaje_boton_reportar" title="Reporta este mensaje por abuso" onclick="reportarMensaje()">Reportar
										<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i>
									</a>
									<a class="mensaje_boton_reportar" title="Borrar este mensaje" onclick="borrarMensaje(this)">Borrar
										<i class="fa fa-trash fa-lg" aria-hidden="true"></i>
									</a>
								<a  class="button small alt boton_responder" onclick="clickboton(this)">Responder</a>
							</div>
							<div class="desplegable">
								<textarea name="respuesta" class="mensaje_respuesta" cols="30" rows="3" placeholder="Responde al mensaje"></textarea>
								<input type="button" value="Enviar" class="button" onclick ="enviarmensaje(this)"">
							</div>
						</div>
					</template>
			<section class="sin">
				<template id='sin_mensajes'>
						<h4 class="sin_mensajes_contenido"></h4>
				</template>
				</div>
			</section>
				</div>
			</section>

		<!-- Footer -->
		<?php require_once('Herramientas/pie.php');?>

		<script src="js/script-mensaje.js"></script>
	</body>
</html>
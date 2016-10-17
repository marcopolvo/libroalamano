<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Contacto</title>
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
		<!-- Modal -->
        <div class="modal invisible">
            <div class="ventana_login invisible" id="login">
                <a href="#" class="boton_cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
                <b><p class="mensaje_error">Usuario o clave errados. Vuelva a intentarlo.</p></b>
                <form method="post" class="login" id="form_login">
               		<input type="text" placeholder=" Usuario" class="" name="nombre" >
               		<input type="password" placeholder=" Contrasena" class="" name="clave" > 
               		<input type="submit" class="fit">
     			</form>
            </div>
        </div>

		<!-- Header -->
        <?php require_once('Herramientas/cabecera.php');?>
			
		<!-- Main -->
		<section class="box subir_libro">
            <h3 class="subtitulo_seccion">
                contactanos
            </h3>
            <form action="#" method="post" class="subir">
            <div class="contenedor">
		        <div class="contenedor_izquierdo">
                    <ul class="link_redesociales">
                        <li><a href="" class="contactosocial">
                            <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                            <span class="linksmall"> Correo: contacto@libroalamano.co </span>
                        </a></li>
                        <li><a href="https://www.facebook.com/Libroalamano-1596051747357457/" class="contactosocial">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                            <span class="linksmall">Grupo facebook: libroalamano</span>
                        </a></li>
                        <li><a href="" class="contactosocial">
                            <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                            <span class="linksmall"> Twitter: @libroalamano</span> 
                        </a></li>
                        <li><a href="" class="contactosocial">
                            <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                            <span class="linksmall">  Google+ :libroalamano</span>
                        </a></li>
                        <li><a href="https://www.instagram.com/libroalamano/" class="contactosocial">
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                            <span class="linksmall">  Instagram :libroalamano</span>
                        </a></li>
                    </ul>
		        </div>
                <div class="contenedor_derecho">
                    <input type="text" placeholder="Nombre" required>
                    <input type="email" placeholder="Correo" required>
                    <textarea name="resumen" placeholder="Mensaje" cols="30" rows="8" required></textarea>
                </div>
            </div>
            <div class="boton_submit">
                <input type="submit" class="">
            </div>
		    </form>
		</section>
		
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Todos los derechos reservados.</li>
								<li>Diseño: <a href="http://templated.co">JoseSoto</a></li>
                                <li><b>Versión Beta</b></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-email"><span class="label">Email</span></a>
								</li>
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

    <script src="js/script-contacto.js"></script>
	</body>
</html>
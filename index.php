<?php 
	session_start();
	 if (isset($_SESSION['usuario'])) {
        header('location: Principal.php');
    }  
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>La pagina para lectores</title>
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
		<style type="text/css">
			.precargar{
				background-color: white;
				width: 100%;
				height: 100%;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 2000;
				display: flex;
			}
			.precargar>div{
				margin: auto;
			}
			.precargar>div>p{
				text-align: center;
				font-weight: bold;
				font-size: 1.2rem;
				font-family: "Courier New", monospace; 
				margin-top: 1em;
			}
		</style>
	</head>
	<body class="landing">

        <!-- cargando -->
        <div class="precargar">
        	<div>
        		<img src="images/logopequeño.png" alt="">
        		<p>Cargando...</p>
        	</div>
        </div>

        <!-- Modal -->
        <div class="modal invisible">
            <div class="ventana_login invisible" id="login">
                <a href="#" class="boton_cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
                <b><p class="mensaje_error">Usuario o clave errados. Vuelva a intentarlo.</p></b>
                <form method="post" class="login" id="form_login">
               		<input type="text" placeholder=" Usuario" class="" name="email" >
               		<input type="password" placeholder=" Contrasena" class="" name="clave" > 
               		<input type="submit" class="fit">
     			</form>
            </div>
        </div>

     	<!-- Header -->
		<header id="header">
			<h1><a href="index.php"><img src="images/logo_librofilos.png" alt="" class="logo"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="biblioteca.php">Libros</a></li>
					<li><a href="contacto.php">Contacto</a></li>
					<li><a href="#" id="ingreso" class="button special">Ingresar</a></li>
				</ul>
			</nav>
		</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Vive y comparte tu pasión por los libros. </h2>
				<p>Una comunidad que ama los libros tanto como tú.</p>
				<ul class="actions">
					<li>
						<a href="registro.php" id="resgistro" class="button fit">Registrarte</a>
					</li>
				</ul>
			</section>

		<!-- Buscador -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Busca el libro que quieres</h2>
						<p>Consigue el libro que quieres al mejor precio, recíbelo en la puerta de tu casa.</p>
		                <div class="buscador">
		                    <input type="text" class="buscar sombra" placeholder="Buscar libro" name="Titulo" id="buscar">
		                    <a id="boton_buscar" class="boton_buscar sombra">Buscar</a>
		                </div>
					</header>
					<section class="profiles">
						 <div class="lista_libros Valorados">
                            <template id="template_valorados">
                                <div class="libros">
                                    <a href="libros.php?libro=" class="libro_enlace">
                                        <img  src="http://lorempixel.com/400/600/sports" alt="Portada" class="libro_imagen sombra">
                                        <span class="libro_detalles">
                                            <p id="titulo_libro_valorados">Título del libro</p>
                                            <p id="autor_libro_valorados" class="autor">Autor</p>
                                            <span class="puntaje">*****</span>
                                        </span>
                                    </a>
                                </div>
                            </template>   
                        </div>
					</section>
					<footer>
						<p>Aquí podrás compartir, intercambiar o vender tus libros con otros miembros de la comunidad. No dejes tus libros llenarse de polvo deja que otros disfruten tu misma pasión.</p>
						<ul class="actions">
							<li>
								<a href="registro.php" class="button big">Quiero vender o intercambiar mis libros</a>
							</li>
						</ul>
					</footer>
				</div>
			</section>
			<div
			  	class="fb-like"
			  	data-share="true"
			  	data-width="450"
			  	data-show-faces="true">
			</div>
		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Bienvenido a Libroalamano</h2>
						<p>Haz parte de nuestra comunidad y podras disfrutar de nuestros servicios </p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-book"></i>
								<h3>Encuentra el libro que buscas</h3>
								<p>Muchos libros nuevos y clásicos compartidos por la comunidad te esperan. Nunca te volverás a preguntar que leer.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-users"></i>
								<h3>Una comunidad de lectores.</h3>
								<p>Una vibrante y apasionada comunidad de lectores con los que encontrarás críticas, reviews y análisis. No estás solo, descubre otras personas a las que ese libro también les cambió la vida.</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-thumbs-up"></i>
								<h3>Una experiencia adaptada a tus gustos.</h3>
								<p>Recibe recomendaciones conforme a tus gustos. Conoce usuarios que tienen tus mismos gustos y comparte con ellos la experiencia de crear comunidad.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		
		<!-- Contacto -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Comunícate con nosotros</h2>
						<p>Estaremos encantados de comunicarnos contigo</p>
					</header>
				</div>
				<div class="container 50%">
					<form action="#" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="nombre" id="name" value="" placeholder="Nombre" type="text">
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="Correo" type="email">
							</div>
							<div class="12u$">
								<textarea name="mensaje" id="message" placeholder="Escriba aqui su mensaje..." rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Enviar mensaje" class="special big" type="submit"></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>

		<section class="logos_ministerio">
			<img src="images/barra-appsco.png" alt="">
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

		<script src="js/main.js"></script>
	</body>
</html>
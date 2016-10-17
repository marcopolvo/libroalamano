<?php 
    SESSION_START(); 
    $genero = isset($_GET['genero'])?$_GET['genero']:'todos';
 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Biblioteca</title>
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
        <input type="hidden" id="namegenero" value="<?php echo $genero?>">
        <input type="hidden" id="cantidad" value="<?php echo 12?>">

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

		<?php 
            require_once('Herramientas/cabecera.php');
        ?>
		
        <!-- search -->
        <section class="">
            <div class="buscador">
                <input type="text" class="buscar sombra" placeholder="Buscar libro" name="Titulo" id="buscar">
                <a id="boton_buscar" class="boton_buscar sombra">Buscar</a>
            </div>
        </section>
            
		<!-- Main -->
		<section id="main" class="wrapper cajados">
			<ul class="filtrar_genero">
				<li><a href="biblioteca.php?genero=<?php echo urlencode('Académico') ?>">Académico</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Acción y aventuras') ?>">Acción y aventuras</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Actualidad') ?>">Actualidad</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Arte') ?>">Arte</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Biografías') ?>">Biografías</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Ciencia') ?>">Ciencia</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Ciencia ficción') ?>">Ciencia ficción</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Cocina / Gastronomía') ?>">Cocina / Gastronomía</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Cómic / manga') ?>">Cómic / manga</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('contemporánea') ?>">contemporánea</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Economía') ?>">Economía</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Empresa') ?>">Empresa</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Estilo de vida') ?>">Estilo de vida</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Fantasía') ?>">Fantasía</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Ficción clásica') ?>">Ficción clásica</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('ficción moderna') ?>">ficción moderna</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Ficción para adultos') ?>">Ficción para adultos</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Ficción para jóvenes')?>">Ficción para jóvenes</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Historia') ?>">Historia</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Humor') ?>">Humor</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Infantil') ?>">Infantil</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Inspiracional') ?>">Inspiracional</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Juvenil') ?>">Juvenil</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Narrativa ') ?>">Narrativa </a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Novela histórica') ?>">Novela histórica</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Novela negra') ?>">Novela negra</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Misterio') ?>">Misterio</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Pensamiento') ?>">Pensamiento</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Poesía y teatro') ?>">Poesía y teatro</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Realismo mágico') ?>">Realismo mágico</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Romántica') ?>">Romántica</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Suspenso') ?>">Suspenso</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Viaje y aventura') ?>">Viaje y aventura</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Terror') ?>">Terror</a></li>
                <li><a href="biblioteca.php?genero=<?php echo urlencode('Otro...') ?>">Otro...</a></li>
			</ul>
			<div class="container resultado_conosulta_libros">
				<header class="major">
					<p>Libros disponibles a un click</p>
				</header>
				<section class="box sombra" >
                    <div class="recomendados">
                        <template id="template">
                            <div class="libros">
                                <a href="libros.php?libro=" class="libro_enlace">
                                    <img id="imagen_template" src="images/no-user.png" alt="" class="libro_imagen sombra">
                                    <span class="libro_detalles">
                                        <p id="titulo_libro">Sin título</p>
                                        <p id="autor_libro">Autor desconocido</p>
                                        <span class="puntaje">*****</span>
                                    </span>
                                </a>
                            </div>
                        </template>
                        <template id='template_sinlibros'>
                            <h3 class="sindatos">No hay ofertas para este libro</h3>
                        </template>
                    </div>  
				</section>
			</div>
		</section>
		
		<!-- Footer -->
		<?php require_once('Herramientas/pie.php');?>

    <script src="js/script-biblioteca.js"></script>
	</body>
</html>
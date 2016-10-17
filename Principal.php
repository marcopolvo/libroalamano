<?php
    SESSION_START(); 
    
    if (!isset($_SESSION['usuario'])) {
        header('location: index.php');
    }else{
        $usuario = $_SESSION['usuario'];
        $email = $_SESSION['email'];
        $genero = $_SESSION['genero'];
    }
    
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Principal</title>
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
        <input type="hidden" id="genero" value="<?php echo $genero?>">
        <input type="hidden" id="cantidad" value="<?php echo 10?>">
        
        <!--modal-->
        <div class="modal invisible">
            <div class="ventana_login sombre invisible" id="mensajeagradecimiento">
                <a href="#" class="boton_cerrar">&#128473;</a>
                <h3>Muchas gracias. Tus comentarios son muy importantes para nosotros nuestra intención es brindarte la mejor experiencia.</h3>
            </div>
        </div>
        <!-- Header -->
        <?php require_once('Herramientas/cabecera.php');?>

        <!-- search -->
        <!--<a href="bibliotecaPublica.php" class="boton__subir">Subir Libro</a>-->

        <!-- search -->
           <section class="">
               <div class="buscador">
                    <input type="text" class="buscar sombra" placeholder="Buscar libro" name="Titulo" id="buscar">
                    <a id="boton_buscar" class="boton_buscar sombra">Buscar</a>
               </div>
           </section>
            
		<!-- Main -->
			<section id="main" class="style1 wrapper">
				<div class="container">

					<header class="major">
						<h2>Libros del mes</h2>
						<p>Libros acorde a tus gustos</p>
					</header>

					<!-- Text -->
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
                            </div>  
                            </div>
						</section>
						
					<!-- Lists -->
						<section>
                            <h3 class="subtitulo_seccion">
                                Últimos libros subidos
                            </h3>
				            <div class="lista_libros ultimos">
                                <template id="template_ultimos">
                                    <div class="libros">
                                        <a href="libros.php?libro=" class="libro_enlace">
                                            <img  src="http://lorempixel.com/400/600/sports" alt="Portada" class="libro_imagen ">
                                            <span class="libro_detalles texto_small">
                                                <p id="titulo_libro_ultimos">Título del libro</p>
                                                <p id="autor_libro_ultimos" class="autor">Autor</p>
                                                <span class="puntaje">*****</span>
                                            </span>
                                        </a>
                                    </div>
                                </template> 
                            </div>
                            <h3 class="subtitulo_seccion">
                                Libros mejor valorados
                            </h3>
                            <div class="lista_libros Valorados">
                                <template id="template_valorados">
                                    <div class="libros">
                                        <a href="libros.php?libro=" class="libro_enlace">
                                            <img  src="http://lorempixel.com/400/600/sports" alt="Portada" class="libro_imagen ">
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
				</div>
			</section>

            <!-- reportes -->
            <input type="checkbox" class="reportes_checkbox" id="check">
            <section class="reportes">
                <label for="check" id="page_principal" class="reportes_label">Queremos saber tu opinión</label>
                <textarea name="reportes" class="reportes_texto" id="textoreporte" cols="30" rows="10" placeholder="¿Cómo crees que podría mejorar tu experiencia? o ¿Has encontrado algún error? Cuéntanos."></textarea>
                <input type="button" class="fit" id="botonreporte" value="Enviar">         
            </section>

			<?php require_once('Herramientas/pie.php');?>


        <script src="js/script-principal.js"></script> 
        <script src="js/script-reportes.js"></script> 
	</body>
</html>
<?php
    SESSION_START(); 
    $busqueda = $_GET['search'];
    
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Resultado de Busqueda</title>
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
       <!--<a href="Subirlibros.php" class="boton__subir">Subir Libro</a>-->
        <input type="hidden" id="genero" value="<?php echo $genero?>">
        <input type="hidden" id="cantidad" value="<?php echo 10?>">

        <!--Modal-->
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

        <!-- search -->
        <section class="subir_libro">
            <div class="buscador_small">
                <div class="buscador_small_superior">
                    <input type="text" value="<?php echo $busqueda ?>" placeholder="Título del libro que desea intercambiar" name="Titulo" id="buscar">
                    <a href="#" id="boton_buscar" class="boton_buscar">Buscar</a>
                </div>
                <div class="contenedor_derecho resultados">
                    <template class="templete" id="template_resultado">
                        <a href="libros.php?libro=" class="resultado_enlace" id="boton_del_cambio">
                            <img src="" alt="portada libro" class="resultado_imagen">
                            <span>
                                <b><p class="resultado_titulo"></p></b>
                                <p class="resultado_autor"></p>
                            </span>
                        </a>
                    </template>
                </div>
            </div>
        </section>
            
		<!-- Main -->
		<section id="main" class="wrapper">		
		</section>

		<?php require_once('Herramientas/pie.php');?>


        <script src="js/script-resultados.js"></script> 
	</body>
</html>
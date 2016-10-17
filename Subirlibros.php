<?php
    SESSION_START(); 
    
    if (!isset($_SESSION['usuario'])) {
        header('location: index.php');
    }
    /*else{
        $usuario = $_SESSION['usuario'];
        $email = $_SESSION['email'];
        $genero = $_SESSION['genero'];
    }*/  
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Subir Libros</title>
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
		<!-- Header -->
		<?php require_once('Herramientas/cabecera.php');?>

		<!-- Main -->
		<section class="subir_libro">
			<div class="buscador_small">
				<div class="buscador_small_superior">
					<input type="text" placeholder="Título del libro que desea intercambiar y/o vender" name="Titulo" id="buscar">
					<a id="boton_buscar" class="boton_buscar">Buscar</a>
				</div>
				<div class="contenedor_derecho resultados">
			      	<template class="templete" id="template_resultado">
			      		<a href="#" class="resultado_enlace" id="boton_del_cambio" onclick="ingresarformulario(this.id)">
				      		<img src="" alt="portada libro" class="resultado_imagen">
				      		<span>
				      			<b><p class="resultado_titulo"></p></b>
				      			<p class="resultado_autor"></p>
				      		</span>
			      		</a>
			      	</template>
			    </div>
			</div>

            <form action="Herramientas/enviarlibro.php?urlimg=" method="post" class="subir" id="subir">
            <h3 class="subtitulo_seccion">
                Llena los datos del libro
            </h3>
	           <div class="contenedor">
			        <div class="contenedor_izquierdo">
			        	<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario'] ?>">
			            <select name="genero" id="">
	                        <option>Género del libro<span class="flecha"></span></option>
	                        <option>Académico</option>
		                    <option>Acción y aventuras</option>
		                    <option>Actualidad</option>
		                    <option>Arte</option>
		                    <option>Biografías</option>
		                    <option>Ciencia</option>
		                    <option>Ciencia ficción</option>
		                    <option>Cocina / Gastronomía</option>
		                    <option>Cómic / manga</option>
		                    <option>Economía</option>
		                    <option>Empresa</option>
		                    <option>Estilo de vida</option>
		                    <option>Fantasía</option>
		                    <option>Ficción clásica</option>
		                    <option>ficción moderna</option>
		                    <option>Ficción para adultos</option>
		                    <option>Ficción para jóvenes </option>
		                    <option>Historia</option>
		                    <option>Humor</option>
		                    <option>Infantil</option>
		                    <option>Inspiracional</option>
		                    <option>Juvenil</option>
		                    <option>contemporánea</option>
		                    <option>Misterio</option>
		                    <option>Narrativa </option>
		                    <option>Novela histórica</option>
		                    <option>Novela negra</option>
		                    <option>Pensamiento</option>
		                    <option>Poesía y teatro</option>
		                    <option>Realismo mágico</option>
		                    <option>Romántica</option>
		                    <option>Suspenso</option>
		                    <option>Terror</option>
		                    <option>Viaje y aventura</option>
		                    <option>Otro...</option>
	                    </select>
			            <div class="venderCambiar">
	                        <div class="subir_libros_vender">
	                            <input id="check_vender" type="checkbox" name="check_vender" value="1">
	                            <label for="check_vender">Vender</label>
	                            <input type="text" name="precio" placeholder="Precio">
	                        </div>
	                        <div class="subir_libros_cambiar">
	    		                <input id="check_cambiar" type="checkbox" name="check_cambiar" value="2">
	                            <label for="check_cambiar">Intercambiar</label>
	                            <input type="text" name="librosrequeridos" placeholder="¿Que libros quieres?">    
	                        </div>
			            </div>
			            <input type="file" class="archivo">
			            <textarea name="estadolibro" id="estado_libro" cols="30" rows="4" placeholder="Describe en que estado se encuentra el libro. "></textarea>     
			      	</div>
			 
				    <div class="contenedor_derecho">
		               	<div class="informacion_portada">
		                   	<img src="images/Sin_portada.png" alt="" id="subir_portadaB" class="portada_subir">
		                   	<input type="hidden" id="subir_portada"  name="portada">
		                   	<div class="informacion_datos">
		                       	<input type="text" value="Titulo:" id="subir_tituloB" name="tituloB" disabled>
		                       	<input type="hidden" id="subir_titulo"  name="titulo">

		                       	<input type="text" value="Autor:" id="subir_autorB" name="autorB" disabled>
		                       	<input type="hidden" id="subir_autor" name="autor">

		                       	<input type="text" value="Género: campo vacio" id="subir_generoB" disabled>
		                       	<input type="hidden" id="subir_genero">

		                       	<input type="text" value="Codigo:" id="subir_codigoB" disabled>
		                       	<input type="hidden" id="subir_codigo" name="codigo">
		                   	</div>
		               	</div>
				       	<textarea name="resumenB" id="subir_resumenB" cols="30" rows="6" disabled>Resumen:</textarea>
				       	<input type="hidden" id="subir_resumen" name="resumen">
				    </div>
	            </div>

            	<div class="boton_submit">
                <input type="submit" class="">
            	</div>
		    </form>
		</section>
		
		<!-- reportes 
        <input type="checkbox" class="reportes_checkbox" id="check">
        <section class="reportes">
            <label for="check" id="page_principal" class="reportes_label">Danos tu opinión </label>
            <textarea name="reportes" class="reportes_texto" id="textoreporte" cols="30" rows="10" placeholder="Sugerencias y reporte de errores"></textarea>
          	<input type="button" class="fit" id="botonreporte" value="Enviar">         
        </section>-->

		<!-- Footer -->
		<?php require_once('Herramientas/pie.php');?>


		<script src="js/script-subirlibros.js"></script>
		<!--<script src="js/script-reportes.js"></script> -->
	</body>
</html>
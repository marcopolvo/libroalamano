<?php 
    SESSION_START(); 
    $libro = isset($_GET['libro'])?$_GET['libro']:'no hay nada';
    $usuario = isset($_SESSION['email'])?$_SESSION['email']:'';
 ?>
<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Libro</title>
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
    <input type="hidden" id="nomusuario" value="<?php echo $usuario ?>">
    <input type="hidden" id="codigo_libro" value="<?php echo $libro ?>">

    <!--modal-->
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
      <div class="ventana_login invisible sombra" id="botonlistadeseos">
        <a href="#" class="boton_cerrar fa fa-times"></a>
        <h3>El libro se agregó con éxito en tu lista de deseos.</h3>
      </div>
      <div class="ventana_login sombra invisible" id="botonopinionlibro">
        <a href="#" class="boton_cerrar fa fa-times"></a>
        <label for="opinionlibro"></label>
        <input type="text" id="opinionlibro" placeholder="Cuéntanos ¿Que te pareció este libro?">
        <input type="submit" class="fit">
      </div>
      <div class="ventana_login sombra invisible" id="botonrecomendar" >
        <a href="#" class="boton_cerrar fa fa-times"></a>
        <h3>Esta función estará muy pronto.</h3>
      </div>
      <div class="ventana_login sombra invisible" id="sugerirlogin">
        <a href="#" class="boton_cerrar fa fa-times"></a>
        <h3>Se parte de nuestra comunidad</h3>
        <p>Para disfrutar de todo lo que libroalamano te ofrece solo tienes que registrarte es GRATIS ;)</p>
        <a href="registro.php" class="button fit">Registrarse</a>
      </div>
      <div class="ventana_oferta invisible sombra" id="ventanofertas">
        <a href="#" class="boton_cerrar fa fa-times"></a>
        <h3 class="subtitulo_seccion">
          Usuarios con este libro
        </h3>
        <template id='template_librosofertados'>
          <div class="ofrecerlibros">
            <div class="datosoferente">
              <div class="vendedor_foto">
                <img alt="" class="foto_oferente">
                <p class="usuariofertante">Nombre usuario</p>
                <input type="hidden" class="nombreoferente">
              </div>
              <div class="vendedor_costo">
                <h3 class="estado">Vender o intercambiar</h3>
                <p class="precio"></p>
                <p class="listadeseos"></p>
                <b><p class="p_sencillo">Estado del libro:<p></b>
                <p class="estadolibro"></p>
              </div>
              <div class="imagenboton">
                <img src="images/sin_foto.png" alt="" class="imagen_libro_real">
                <a class="button small" onClick="mostrarModal(this)">Contactar</a>
              </div>                        
            </div>
            <div class="desplegable" >
              <a href="#" class="boton_cerrar fa fa-times"></a>
              <textarea name="mensaje" cols="30" rows="3" placeholder="Contacta con el vendedor" class="mensaje_respuesta"></textarea>
              <input type="button" value="Enviar" class="fit" onClick="enviarmensaje(this)" >
            </div>
          </div>
        </template>
        <template id='template_sindatos'>
          <h3 class="sin_mensajes_contenido">No hay ofertas para este libro</h3>
        </template>
      </div>
    </div>

    <!-- Header -->
    <?php require_once('Herramientas/cabecera.php') ?>

    <!-- Main -->
    <section id="main" class="wrapper style1 special">
			<div class="10u 12u$(medium) Detalle_libro">
				<section class="box">
				  <div class="adquirir_detalle">
            <div class="adquirir_detalle_imagen">
              <img alt="portada del libro" id="libro__portada">
            </div>
						<div class="adquirir_detalle_descripcion">
							<h3 id="libro__titulo">No hay título</h3>
							<h4 id="libro__autor">Autor desconocido</h4>
							<p><b>Resumen: </b><span id="libro__resumen">No se encuentra resumen de este libro</span></p>
						</div>
						<div class="adquirir_detalle_botones">
              <div class="botones_estado">
                <a href="#" class="button alt" onclick="mostrarModalA()">Lo quiero leer</a>
								<a href="#" class="button alt" onclick="mostrarModalB()">Ya lo leí</a>
								<a href="#" class="button alt" onclick="mostrarModalC()">Recomendar a un amigo</a>    
              </div>
							<a href="#" class="button" id="boton_adquirir" onclick="mostrarModaloferta()">Adquirir</a>
						</div>
          </div>     
	        <div class="lista_similares">
	          <h3 class="subtitulo_seccion">
              También te podrían interesar
            </h3>
            <div class="lista_libros ultimos">
              <template id="template_ultimos">
                <div class="libros">
                  <a href="libros.php?libro=" class="libro_enlace">
                    <img  src="http://lorempixel.com/400/600/sports" alt="Portada" class="libro_imagen ">
                    <span class="libro_detalles">
                      <p id="titulo_libro_ultimos">Título del libro</p>
                      <p id="autor_libro_ultimos">Autor</p>
                      <span class="puntaje">*****</span>
                    </span>
                  </a>
                </div>
              </template> 
            </div>
          </div>
		    </section>
		  </div>
		</section>

    <!-- Footer -->
    <?php require_once('Herramientas/pie.php');?>
        
    <script src='js/script-libros.js'></script>
	</body>
</html>
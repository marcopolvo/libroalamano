<?php 
    if (isset($_SESSION['usuario'])) {
        $correo = $_SESSION['email'];
?>
<header id="header">
	<h1 class="logo__principal">
		<a href="index.php">
			<img src="images/logo_librofilos.png" alt="logo libroalamano" class="logo">
		</a>
	</h1>
	<nav id="nav">
		<ul>
            <li>
            	<a href="Subirlibros.php" class="button small">Subir Libro</a>
            </li>
            <li><?php echo $correo ?></li>
			<li>
                <a href="mensajes.php"><i class="fa fa-envelope fa-lg" aria-hidden="true"><span class="mensaje_indicador" id="indicadormensaje"><?php 
                                    include_once('Herramientas/conexion1.php');
                                    $sql = "SELECT COUNT(*) FROM mensajes WHERE receptor = '{$correo}'&& estado = 'sinleer'";
                                    $resultados = $pdo->query($sql);
                                    $cuenta = $resultados->fetchColumn();
                                    echo $cuenta;                                    
                                ?>
                </span></i>Mensaje</a>
            </li>
            <li>
            	<a href="Herramientas/salir.php"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> salir</a>
            </li>
            <li class="xxx">
                <a href="Principal.php">
                	<img src="<?php echo $_SESSION['foto'] ?>" alt="imagen usuario" class="img_perfil">
                    <!--<span><?//php echo $_SESSION['usuario'] ?></span>-->
                </a>
            </li>
		</ul>
	</nav>
</header>
<?php 
    }else{
?>
<header id="header">
    <h1 class="logo__principal"><a href="index.php"><img src="images/logo_librofilos.png" alt="" class="logo"></a></h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="biblioteca.php">Libros</a></li>
                <!-- <li><a href="blog.php">Blog</a></li>-->
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="#" id="ingreso" class="boton_resaltado button alt small">Ingresar</a></li>
                <li><a href="registro.php" class="button small">Registrarte</a></li>
            </ul>
        </nav>
</header>
<?php } ?>
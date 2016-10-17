<?php 
    // start a new session (required for Hybridauth)
    session_start();
     if (isset($_SESSION['usuario'])) {
        header('location: Principal.php');
    }
    // You know how it works...
    $link = mysqli_connect( "localhost", "josefsoto", "elcico285", "libroalamano" );

    /** We need this function cause I'm lazy**/
    function mysqli_query_excute( $sql ){
        global $link;
        $result = mysqli_query( $link, $sql );
        if(  ! $result ){
            die( printf( "Error: %s\n", mysqli_error( $link ) ) );
        }
        return $result->fetch_object();
    }

    function mysqli_query_excute2( $sql ){
        global $link;
        $result = mysqli_query( $link, $sql );
        if(  ! $result ){
            die( printf( "Error: %s\n", mysqli_error( $link ) ) );
        }
    }

    /** get the user data from database by email and password**/
    function get_user_by_email_and_password( $email, $password ){
        return mysqli_query_excute( "SELECT * FROM usuarios WHERE email = '$email' AND clave = '$password'" ); 
    }

    /**get the user data from database by provider name and provider user id**/
    function get_user_by_provider_and_id( $provider_name, $provider_user_id ){
        return mysqli_query_excute( "SELECT * FROM usuarios WHERE provedor_nombre = '$provider_name' AND provedor_id_user = '$provider_user_id'" );
    }

    /**get the user data from database by provider name and provider user id**/
    function create_new_hybridauth_user( $email, $first_name, $last_name, $photo, $type_user, $provider_name, $provider_user_id ){
        // let generate a random password for the user
        $password = md5( str_shuffle( "0123456789abcdefghijklmnoABCDEFGHIJ" ) );

        mysqli_query_excute2( 
            "INSERT INTO usuarios
            ( 
                email, 
                nombre, 
                apellido, 
                clave, 
                foto, 
                genero,
                tipo_usuario,
                provedor_nombre, 
                provedor_id_user, 
                fecha_registro 
            ) 
            VALUES
            ( 
                '$email',
                '$first_name',
                '$last_name',
                '$password',
                '$photo',
                'todos',
                '$type_user',
                '$provider_name',
                '$provider_user_id',
                NOW()
            )"
        );
    }

   if( isset( $_REQUEST["provider"] ) ){ 
        // the selected provider
        $provider_name = $_REQUEST["provider"];

        try{
            // change the following paths if necessary 
            $config   = dirname(__FILE__) . '/hybridauth/config.php';
            require_once( "hybridauth/Hybrid/Auth.php" );
            // initialize Hybrid_Auth with a given file
            $hybridauth = new Hybrid_Auth( $config );
            // try to authenticate with the selected provider
            $adapter = $hybridauth->authenticate( $provider_name );
            // then grab the user profile 
            $user_profile = $adapter->getUserProfile();
        }  
        // something went wrong?
        catch( Exception $e ){
            echo 'Exception' . $e->getMessage();
        }
        // check if the current user already have authenticated using this provider before 
        $user_exist = get_user_by_provider_and_id( $provider_name, $user_profile->identifier );

        // if the used didn't authenticate using the selected provider before 
        // we create a new entry on database.usuarios for him
        if( ! $user_exist ) 
        {
            create_new_hybridauth_user(
                $user_profile->email, 
                $user_profile->firstName, 
                $user_profile->lastName, 
                $user_profile->photoURL,
                4,
                $provider_name,
                $user_profile->identifier
            );
        }
        // set the user as connected and redirect him
        $_SESSION["user_connected"] = true;
        $_SESSION['usuario']=$user_profile->firstName.' '.$user_profile->lastName;
        $_SESSION['email']=$user_profile->email;
        $_SESSION['foto']=$user_profile->photoURL;
        $_SESSION['genero']='todos';

        header("Location: http://localhost/libroalamano/Principal.php");
    /*
    */
    }
    /*
    <form method="post" action="login.php"> 
        Email   : <input type="text" name="email" /><br /> 
        Password: <input type="password" name="password" /><br /> 
             
        echo '<pre>';
        var_dump($user_profile);
        echo '</pre>';
        <input type="submit" value="Sign-in" />
                
        <?php echo __FILE__ ?>
        <a href="">Signin with Facebook</a> -
        <a href="" >Signin with Twitter</a> -
        <a href="">Signin with Linkedin</a> 
    </form>
    */
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro</title>
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
		<!-- Main -->
        <form action="Herramientas/datos.php" class="login" method="post"  id="form" onsubmit="return validar()"> 
    		<div class="main_register">
        		<div class="formulario_registro" id="formulario">
                    <header id="header">
                        <a href="index.php"><img src="images/logo_librofilos.png" class="logo" alt=""></a>    
                    </header>
                    <div class="formulario_cuerpo">
                        <div class="registro_social">
                            <a href="registro.php?provider=facebook" class="boton_social facebook"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i><span>Registro por facebook</span></a>
                            <a href="registro.php?provider=twitter" class="boton_social twitter"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i><span>Registro por twitter</span></a>
                            <a href="login-with.php?provider=Google" class="boton_social googleplus"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i><span>Registro por Google+</span></a>
                        </div>
                        
                        <div class="registro_normal" >
                            <div class="nombre_usuario">
                                <input type="text" placeholder="Nombre" minlength="4" id="nombre" name="nombre" onblur="validarnombre();" required />
                                <p class="mensaje_error visible" id="mensajerror_nombre"></p>
                                <input type="text" placeholder="Apellido" minlength="4" id="apellido" name="apellido"/>
                            </div>                           
                            <input type="email" placeholder="Email" id="email"  name="email" onblur="validaremail()" required />
                            <p class="mensaje_error visible" id="mensajerror_email"></p>
                            <input type="password" placeholder="Contraseña" minlength="8" id="clave" name="clave" onkeyup="validarclave()" onblur="validarclave()" required />
                            <p class="mensaje_error visible" id="mensajerror_clave"></p>
                            <select name="generop" id="generop" onblur="validargenero()" required>
                                <option selected disabled>¿Cuál es tu género literario favorito?</option>
                                <option>Académico</option>
                                <option>Acción y aventuras</option>
                                <option>Actualidad</option>
                                <option>Arte</option>
                                <option>Biografías</option>
                                <option>Ciencia</option>
                                <option>Ciencia ficción</option>
                                <option>Cocina / Gastronomía</option>
                                <option>Cómic / manga</option>
                                <option>contemporánea</option>
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
                                <option>Narrativa </option>
                                <option>Novela histórica</option>
                                <option>Novela negra</option>
                                <option>Misterio</option>
                                <option>Pensamiento</option>
                                <option>Poesía y teatro</option>
                                <option>Realismo mágico</option>
                                <option>Romántica</option>
                                <option>Suspenso</option>
                                <option>Viaje y aventura</option>
                                <option>Terror</option>
                                <option>Otro...</option>
                            </select>
                            <p class="mensaje_error visible" id="mensajerror_genero"></p>
                            <input type="submit" class="fit" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="pregunta1 invisible formulario_registro">
                <h3>Queremos sebar mas de ti</h3>
                <input type="text" placeholder="Cual es tu libro favorito" name="libro">
                <input type="button" name="Siguiente" value="Siguiente">
            </div>
            <div class="pregunta invisible formulario_registro">
                <h3>Queremos sebar mas de ti</h3>
                <input type="text" placeholder="Cual es tu escritor favorito" name="autor">
                <input type="button" name="Siguiente" value="Siguiente" class="boton_siguiente">
            </div>
            <div class="pregunta invisible formulario_registro">
                <h3>Queremos sebar mas de ti</h3>
                <input type="text" placeholder="Cual es tu genero favorito" name="genero">
                <div class="boton_siguiente">
                    <input type="submit" name="Siguiente">
                </div>
            </div>
            <div class="pregunta invisible formulario_registro">
            </div>
        </form>
		<!-- Footer -->
	   
       <script src='js/script-registro.js'></script>
	</body>
</html>
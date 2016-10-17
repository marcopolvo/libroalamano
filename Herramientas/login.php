<?php 

	$resultado ="no";
	include_once('conexion1.php');

	$consultar = $pdo->prepare('SELECT * FROM usuarios');
	$consultar->execute();

	while ($datos=$consultar->fetch()) {
		if ('jose@soto.co'==$datos[1] && password_verify('12345678', $datos[4])) {
			session_start();
			$_SESSION['email']=$datos[1];
			$_SESSION['usuario']=$datos[2].' '.$datos[3];
			$_SESSION['foto']=$datos[5];
			$_SESSION['genero']=$datos[6];
			$resultado = 'si';		
		}
	}
	echo $resultado;

?>
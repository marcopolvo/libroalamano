<?php 
	require_once('conexion1.php');

	$tabla = $_POST['tabla'];
	$usuario = isset($_POST['usuario'])?$_POST['usuario']:'no existe';
	$codigo = isset($_POST['codigo'])?$_POST['codigo']:'sin codigo';
	$genero = isset($_POST['genero'])?$_POST['genero']:'todos';
	$mensaje = isset($_POST['mensaje'])?$_POST['mensaje']:'sin mensaje';
	echo $tabla;
	$sql = 'INSERT IGNORE INTO '.$tabla.'( 
		codigolibro, 
		usuario, 
		genero 
		)VALUES(
		?,
		?,
		?
	)';
	$insertar = $pdo->prepare($sql);
	$insertar->execute(array(
		$codigo, 
		$usuario, 
		$genero,
	));

	if ($tabla=='leidos') {
		$sqlB = 'INSERT IGNORE INTO comentarios( 
			fecha, 
			usuario, 
			codigolibro,
			mensaje 
			)VALUES(
			NOW(),
			?,
			?,
			?
		)';

		$insertarB = $pdo->prepare($sqlB);
		$insertarB->execute(array(
			$usuario, 
			$codigo, 
			$mensaje
		));
	}
?>
<?php 

	require_once('conexion1.php');

	$emisor = isset($_POST['emisor'])?$_POST['emisor']:'';
	$receptor = isset($_POST['receptor'])?$_POST['receptor']:'no hay nada';
	$mensaje = isset($_POST['mensaje'])?$_POST['mensaje']:'';

	$sql = 'INSERT INTO mensajes(
		fecha, 
		hora, 
		emisor, 
		receptor, 
		mensaje, 
		estado
		)VALUES(
		CURRENT_DATE(),
		CURRENT_TIME(),
		?,
		?,
		?,
		?
		)';

	$insertar = $pdo->prepare($sql);
	$insertar->execute(array(
		$emisor, 
		$receptor, 
		$mensaje,
		'sinleer'
		));
?>
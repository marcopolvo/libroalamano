<?php 
	require_once('conexion1.php');

	$fecha = isset($_POST['fecha'])?$_POST['fecha']:'';
	$nombre = isset($_POST['nombre'])?$_POST['nombre']:'no hay nada';
	$email = isset($_POST['email'])?$_POST['email']:'';
	$mensaje = isset($_POST['mensaje'])?$_POST['mensaje']:'';
	//$portada = isset($_POST['portada'])?$_POST['portada']:'';

	//$estado = $check_cambiar+$check_vender;

	$sql = 'INSERT INTO libros(fecha, nombre, email, mensaje)VALUES(?,?,?,?)';
	$insertar = $pdo->prepare($sql);
	$insertar->execute(array($fecha, $nombre, $email, $mensaje));
	
	//header('location:../Subirlibros.php');
	
	echo "\nPDOStatement::errorInfo():\n";
	$arr = $insertar->errorInfo();
	print_r($arr);
?>
<?php 
	require_once('conexion1.php');

	$usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
	$mensaje = isset($_POST['mensaje'])?$_POST['mensaje']:'';
	$lugar = isset($_POST['lugar'])?$_POST['lugar']:'';

	$sql = 'INSERT INTO reportes(fecha, hora, usuario, mensaje, lugar)VALUES(CURRENT_DATE(),CURRENT_TIME(),?,?,?)';
	$insertar = $pdo->prepare($sql);
	$insertar->execute(array($usuario, $mensaje, $lugar));

	echo "\nPDOStatement::errorInfo():\n";
	$arr = $insertar->errorInfo();
	print_r($arr);
?>
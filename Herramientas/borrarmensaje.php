<?php 
	require_once('conexion1.php');
	$idmensaje = $_POST['idmensaje'];
	$estado = $_POST['estado'];

	$peticion = "UPDATE mensajes SET estado = ? where id = ?";
	$modificar = $pdo->prepare($peticion);
	$modificar->execute(array($estado, $idmensaje));
?>
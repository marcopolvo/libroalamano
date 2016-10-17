<?php 
	$resultado ="no";
	include_once('conexion1.php');

	$consultar = $pdo->prepare('SELECT * FROM usuarios');
	$consultar->execute();

	while ($datos=$consultar->fetch()) {
		if ($_POST['nombre']==$datos[1]) {
			$resultado = 'si';		
		}
	}
	echo $resultado;

?>
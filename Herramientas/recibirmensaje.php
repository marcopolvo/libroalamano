<?php 
	/*require_once('conexion1.php');
	header('content-type: text/javascript');
	$receptor = $_GET['receptor'];
	//$cantidad = $_GET['cantidad'];
	$sql = "SELECT * FROM mensajes WHERE receptor = '{$receptor}'&& estado='sinleer' ORDER BY fecha DESC, hora DESC";
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$libros = array();
	$contador = 0;

	foreach ($results as $valor) {
		$libros[$contador++] = array(
			'id' => $valor['id'],
			'fecha' => $valor['fecha'],
			'hora' => $valor['hora'],
			'emisor' => $valor['emisor'],
			'receptor' => $valor['receptor'],
			'mensaje' => $valor['mensaje']
		);
	};
	$json_string = json_encode($libros);
	echo $json_string;
*/
	include_once('conexion1.php');

	header('content-type: text/javascript');
	$receptor = $_GET['receptor'];
	//$cantidad = $_GET['cantidad'];
	$sql = "SELECT mensajes.*, 
		usuarios.nombre, 
		usuarios.apellido,
		usuarios.foto FROM 
		mensajes INNER JOIN 
		usuarios ON 
		mensajes.emisor = usuarios.email WHERE 
		receptor = '{$receptor}'&& 
		estado !='borrado' ORDER BY 
		fecha ASC, hora ASC";
	$sql2 = "UPDATE mensajes SET estado = ? WHERE receptor =? && estado = ?";
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$libros = array();
	$contador = 0;

	foreach ($results as $valor) {
		$libros[$contador++] = array(
			'id' => $valor['id'],
			'fecha' => $valor['fecha'],
			'hora' => $valor['hora'],
			'email' => $valor['emisor'],
			'emisor' => $valor['nombre'].' '.$valor['apellido'],
			'foto' => $valor['foto'],
			'receptor' => $valor['receptor'],
			'mensaje' => $valor['mensaje']
		);
	};

	$peticion = $pdo->prepare($sql2);
	$peticion->execute(array('leido',$receptor,'sinleer'));

	$json_string = json_encode($libros);
	echo $json_string;
?>
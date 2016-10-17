<?php 
	require_once('conexion1.php');
	header('content-type: text/javascript');
	$codigo = $_GET['codigo'];
	$sql = "SELECT * FROM librosintercambio WHERE codigo = '".$codigo."' ORDER BY RAND() ";
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$libros = array();
	$contador = 0;

	foreach ($results as $valor) {
		$libros[$contador++] = array(
			'usuario' => $valor['usuario'],
			'precio' => $valor['precio'],
			'librosrequeridos' => $valor['librosrequeridos'],
			'estadolibro' => $valor['estadolibro'],
			'estado' => $valor['estado']
			);
	};
	$json_string = json_encode($libros);
	echo $json_string;
?>

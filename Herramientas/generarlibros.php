<?php 
	require_once('conexion1.php');
	header('content-type: text/javascript');
	$genero = $_GET['genero'];
	$cantidad = $_GET['cantidad'];
	$sql = "SELECT * FROM libros WHERE genero = '".$genero."' ORDER BY RAND() LIMIT 12";
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$libros = array();
	$contador = 0;

	foreach ($results as $valor) {
		$libros[$contador++] = array(
			'codigo' => $valor['codigo'],
			'titulo' => $valor['titulo'],
			'autor' => $valor['autor'],
			'genero' => $valor['genero'],
			'portada' => $valor['portada']
		);
	};
	$json_string = json_encode($libros);
	echo $json_string;
	
?>
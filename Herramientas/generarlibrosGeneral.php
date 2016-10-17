<?php 
	require_once('conexion1.php');
	header('content-type: text/javascript');
	$genero = isset($_GET['genero'])?$_GET['genero']:'todos';
	$cantidad = isset($_GET['cantidad'])?$_GET['cantidad']:6;
	if ($genero=='todos') {
		$sql = "SELECT * FROM libros ORDER BY RAND() LIMIT ".$cantidad."";
	}else{
		$sql = "SELECT * FROM libros WHERE genero = '".$genero."' ORDER BY RAND() LIMIT ".$cantidad."";	
	}
	
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
			'portada' => $valor['portada'],
			'genero' => $valor['genero']
			);
	};
	$json_string = json_encode($libros);
	echo $json_string;
?>

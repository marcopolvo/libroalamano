<?php 
	require_once('conexion1.php');
	header('content-type: text/javascript');
	$codigo = isset($_GET['codigo'])?$_GET['codigo']:'0000000';
	$sql ="SELECT ofertas.*, 
		usuarios.nombre, 
		usuarios.apellido,
		usuarios.foto FROM 
		ofertas INNER JOIN 
		usuarios ON 
		ofertas.usuario = usuarios.email WHERE 
		ofertas.codigo = '{$codigo}' ORDER BY 
		ofertas.id DESC ";
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$libros = array();
	$contador = 0;

	foreach ($results as $valor) {
		$libros[$contador++] = array(
			'id' => $valor['id'],
			'usuario' => $valor['usuario'],
			'nombre' => $valor['nombre'].' '.$valor['apellido'],
			'foto' => $valor['foto'],
			'precio' => $valor['precio'],
			'librosrequeridos' => $valor['librosrequeridos'],
			'estadolibro' => $valor['estadolibro'],
			'estado' => $valor['estado']
			);
	};
	$json_string = json_encode($libros);
	echo $json_string;
?>

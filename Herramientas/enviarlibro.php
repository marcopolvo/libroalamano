<?php 
	require_once('conexion1.php');

	$codigo = isset($_POST['codigo'])?$_POST['codigo']:'';
	$titulo = isset($_POST['titulo'])?$_POST['titulo']:'no hay nada';
	$autor = isset($_POST['autor'])?$_POST['autor']:'';
	$genero = isset($_POST['genero'])?$_POST['genero']:'';
	$portada = isset($_GET['urlimg'])?$_GET['urlimg']:'';

	echo $codigo.'<br>';
	echo $titulo.'<br>';
	echo $autor.'<br>';
	echo $genero.'<br>';
	echo $portada.'<br>';
	
	$usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
	$check_vender = isset($_POST['check_vender'])?$_POST['check_vender']:'';
	$precio = isset($_POST['precio'])?$_POST['precio']:'';
	$check_cambiar = isset($_POST['check_cambiar'])?$_POST['check_cambiar']:'';
	$librosrequeridos = isset($_POST['librosrequeridos'])?$_POST['librosrequeridos']:'';
	$estadolibro = isset($_POST['estadolibro'])?$_POST['estadolibro']:'';

	$estado = $check_cambiar+$check_vender;

	$sql = 'INSERT INTO libros(codigo, titulo, autor, genero, portada, fechaHora)VALUES(?,?,?,?,?,NOW())';
	$insertar = $pdo->prepare($sql);
	$insertar->execute(array($codigo, $titulo, $autor, $genero, $portada));

	$sqlB = 'INSERT INTO librosintercambio(usuario, precio, librosrequeridos, estadolibro, estado, codigo)VALUES(?,?,?,?,?,?)';
	$insertarB = $pdo->prepare($sqlB);
	$insertarB->execute(array($usuario, $precio, $librosrequeridos, $estadolibro, $estado, $codigo));
	
	//header('location:../Subirlibros.php');
	
	echo "\nPDOStatement::errorInfo():\n";
	$arr = $insertar->errorInfo();
	print_r($arr);
?>
<?php 
	require_once('../conexion1.php');

	$codigo = isset($_POST['codigo'])?$_POST['codigo']:'';
	$titulo = isset($_POST['titulo'])?$_POST['titulo']:'no hay nada';
	$autor = isset($_POST['autor'])?$_POST['autor']:'';
	$genero = isset($_POST['genero'])?$_POST['genero']:'';
	$portada = isset($_POST['portada'])?$_POST['portada']:'';
	echo $titulo;
	
	$sql = 'INSERT INTO libros(codigo, titulo, autor, genero, portada)VALUES(?,?,?,?,?)';
	$insertar = $pdo->prepare($sql);
	$insertar->execute(array($codigo, $titulo, $autor, $genero, $portada));
	header('location:index.html');
	
	
	echo "\nPDOStatement::errorInfo():\n";
	$arr = $insertar->errorInfo();
	print_r($arr);
?>
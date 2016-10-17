<?php 
	require_once('conexion1.php');

	$email = isset($_POST['email'])?$_POST['email']:'';
	$nombre = isset($_POST['nombre'])?$_POST['nombre']:'';
	$apellido = isset($_POST['apellido'])?$_POST['apellido']:'';
	$hash = isset($_POST['clave'])?$_POST['clave']:'';
	$foto = 'images/avatar.jpg';
	$generop = isset($_POST['generop'])?$_POST['generop']:'todos';
	$tipo = 4;
	$autor = isset($_POST['autor'])?$_POST['autor']:'';
	$libro = isset($_POST['libro'])?$_POST['libro']:'';

	$clave= password_hash($hash, PASSWORD_DEFAULT);
	
	$sql = 'INSERT INTO usuarios( 
		email, 
		nombre, 
		apellido, 
		clave, 
		foto, 
		genero, 
		tipo_usuario, 
		provedor_nombre, 
		provedor_id_user,
		fecha_registro
		)VALUES(?,?,?,?,?,?,?,?,?,NOW())';

	$insertar = $pdo->prepare($sql);
	$insertar->execute(array(
		$email, 
		$nombre, 
		$apellido,
		$clave, 
		$foto,
		$generop,
		$tipo, 
		'registro_correo',
		'000000'
	));
	
	session_start();
	$_SESSION['usuario']=$nombre.' '.$apellido;
	$_SESSION['email']=$email;
	$_SESSION['foto']=$foto;
	$_SESSION['genero']=$generop;

	header('location:../Principal.php');
	
	
	/*echo "\nPDOStatement::errorInfo():\n";
	$arr = $insertar->errorInfo();
	print_r($arr);*/
?>
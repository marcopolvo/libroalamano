<?php 
	$dsn = 'mysql:dbname=epiz_18739870_libroalamano;host=sql207.epizy.com';
	$user = 'epiz_18739870';
	$clave= 'marco123';

	try{
		$pdo = new PDO($dsn,$user,$clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}catch(PDOException $e){
		echo 'error al conectar: '.$e->getMessage();
	}
 ?>
<?php 
    $dsn = 'mysql:dbname=libroalamano;host=localhost';
    $user = 'josefsoto';
    $clave= 'elcico285';

    try{
        $pdo = new PDO($dsn,$user,$clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch(PDOException $e){
        echo 'error al conectar: '.$e->getMessage();
    }
 ?>
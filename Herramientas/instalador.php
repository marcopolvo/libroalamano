<?php 
    
    $conexionInicial = new mysqli('localhost','josefsoto','elcico285');
    if($conexionInicial->connect_errno){
    	echo 'error en la conexionInicial </br>';
    }else
        echo 'conexionInicial exitosa </br>';
    $crearBD = "CREATE DATABASE IF NOT EXISTS librofilos";
    $conexionInicial->query($crearBD);
    if ($conexionInicial->close()) {
        echo 'La conexionInicial se cerro con exito </br>';
    }
    $conexion = new mysqli('localhost','josefsoto','elcico285','librofilos');

    $tableUser = "CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(50) NOT NULL,
        `nombre` varchar(50) NOT NULL,
        `apellido` varchar(50) NOT NULL,
        `usuario` varchar(50) NOT NULL,
        `clave` varchar(250) NOT NULL,
        `foto` varchar(250),
        `genero` varchar(50) NOT NULL,
        `tipo_usuario` varchar(50) NOT NULL,
        `fecha_registro` datetime NOT NULL,
        `provedor_nombre` VARCHAR(255),
        `provedor_id_user` VARCHAR(255),
        PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
    )   ENGINE=InnoDB  DEFAULT CHARSET=utf8";
    
    $hash= password_hash('admin', PASSWORD_DEFAULT);
    $addUser = "INSERT INTO usuarios(nombre, email, clave) VALUES('admin', 'jose@soto', '{$hash}')";

    $tablelibro = "CREATE TABLE IF NOT EXISTS libros(
        codigo varchar(20)NOT NULL primary key,
        titulo varchar(50)NOT NULL,
        autor varchar(30)NOT NULL,
        genero varchar(30)NOT NULL,
        portada varchar(200)NOT NULL,
        persona1 varchar(20),
        persona2 varchar(20),
        persona3 varchar(20)
        )";

    $tablelibro = "CREATE TABLE IF NOT EXISTS libros(
        codigo varchar(20)NOT NULL primary key,
        titulo varchar(50)NOT NULL,
        autor varchar(30)NOT NULL,
        genero varchar(30)NOT NULL,
        portada varchar(200)NOT NULL,
        persona1 varchar(20),
        persona2 varchar(20),
        persona3 varchar(20)
        )";
    /*
    $datosTienda = "CREATE TABLE IF NOT EXISTS informacion(
        Name varchar(25) NOT NULL,
        Logo mediumblob NOT NULL,
        ImagenP longblob NOT NULL,
        Category1 mediumblob NOT NULL,
        Category2 mediumblob NOT NULL,
        Category3 mediumblob NOT NULL,
        Category4 mediumblob NOT NULL,
        Phone varchar(100),
        Cell  varchar(100),
        Adress varchar(100),
        Email varchar(100)
        )";
    */
    $librosfavoritos = "CREATE TABLE IF NOT EXISTS 'librosfavoritos'(
    'usuario' varchar(50) NOT NULL PRIMARY KEY,
    'codigolibro' varchar(50) NOT NULL,
    'genero' varchar(50) NOT NULL
    )";

    $tableUser = "CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(50) NOT NULL,
        `nombre` varchar(50) NOT NULL,
        `apellido` varchar(50) NOT NULL,
        `usuario` varchar(50) NOT NULL,
        `clave` varchar(250) NOT NULL,
        `foto` varchar(250),
        `genero` varchar(50) NOT NULL,
        `tipo_usuario` varchar(50) NOT NULL,
        `fecha_registro` datetime NOT NULL,
        `provedor_nombre` VARCHAR(255),
        `provedor_id_user` VARCHAR(255),
        PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
    )   ENGINE=InnoDB  DEFAULT CHARSET=utf8";

    if ($conexion->query($tableUser)){
    	echo ' La tabla usuarios se creo satisfactoriamente</br>';
    }else{
    	echo ' Error al crear la tabla usuarios'. $conexion->error;
    }
    
    if ($conexion->query($addUser)){
        echo 'Se agregaron los datos a la tabla usuarios</br>';
    }else{
        echo ' Error al agregar datos a la tabla usuarios'. $conexion->error;
    }
    
    if ($conexion->query($tablelibro)){
        echo ' La tabla libro se creo satisfactoriamente</br>';
    }else{
        echo ' Error al crear la tabla libro'. $conexion->error;
    }

    if ($conexion->query($librosfavoritos)){
        echo ' La tabla librosfavoritos se creo satisfactoriamente</br>';
    }else{
        echo ' Error al crear la tabla librosfavoritos'. $conexion->error;
    }
    /*
    if ($conexion->query($datosTienda)){
        echo ' La tabla informacion se creo satisfactoriamente</br>';
    }else{
        echo ' Error al crear la tabla informacion'. $conexion->error;
    }
    */
    if ($conexion->close()) {
        echo 'La conexion se cerro con exito </br>';
    }else{
        echo 'Error al cerrar la conexion </br>'. $conexion->error;
    }
 ?>
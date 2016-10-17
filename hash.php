<?php
	$clave = $_GET['clave']; 
	echo password_hash($clave, PASSWORD_DEFAULT);

	CREATE TABLE IF NOT EXISTS `usuarios` (
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
	) 	ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

	CREATE TABLE IF NOT EXISTS `mensajes` (
	  	`id` int(11) NOT NULL AUTO_INCREMENT,
	  	`fecha` date NOT NULL,
	  	`hora` time NOT NULL,
	  	`emisor` varchar(50) NOT NULL,
	  	`receptor` varchar(50) NOT NULL,
	  	`mensaje` varchar(250) NOT NULL,
	  	`estado` int(2),
	  	PRIMARY KEY (`id`),
	) 	ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
?>

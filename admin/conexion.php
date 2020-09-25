<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'pos_system';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}


	// define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/systema_pos/');

	// define('PRODUCTO_IMAGEN_SERVER_PATH',SERVER_PATH.'/systema_pos/');


?>
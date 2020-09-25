<?php 
session_start();
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'pos_system';
	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/systema_pos/');

define('SITE_PATH','http://127.0.0.1/systema_pos/');


?>
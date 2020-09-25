<?php
require('conexion.php');
require('functions.inc.php');

// prx($_POST);

$name=get_safe_value($conection,$_POST['name']);
$email=get_safe_value($conection,$_POST['email']);
$telefono=get_safe_value($conection,$_POST['telefono']);
$password=get_safe_value($conection,$_POST['password']);

$check_user=mysqli_num_rows(mysqli_query($conection, "select * from users where email='$email'"));
if ($check_user>0) {
	echo "email_present";
}else{
$added_on=date('Y-m-d h:i:s');
	mysqli_query($conection, "insert into users(nombre,email,telefono,added_on,password) values('$name','$email','$telefono','$added_on','$password')");
	echo "insert";
}
// mysqli_query($conection, "insert into contactos(nombre,email,telefono,comentario,added_on) values('$name','$email','$tel','$mensaje','$added_on')");
// echo "Gracias";
?>
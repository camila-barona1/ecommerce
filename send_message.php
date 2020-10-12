<?php
require('conexion.php');
require('functions.inc.php');

$name=get_safe_value($conection,$_POST['name']);
$email=get_safe_value($conection,$_POST['email']);
$tel=get_safe_value($conection,$_POST['tel']);
$mensaje=get_safe_value($conection,$_POST['mensaje']);
$added_on=date('Y-m-d h:i:s');

mysqli_query($conection, "insert into contactos(nombre,email,telefono,comentario,added_on) values('$name','$email','$tel','$mensaje','$added_on')");
echo "Gracias por comicarte con nosotros";
?>
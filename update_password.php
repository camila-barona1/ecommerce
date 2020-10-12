<?php
require('conexion.php');
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$current_password=md5(get_safe_value($conection,$_POST['current_password']));
$new_password= md5(get_safe_value($conection,$_POST['new_password']));
$uid=$_SESSION['USER_ID'];

$row=mysqli_fetch_assoc(mysqli_query($conection,"select password from users where idUsers='$uid'"));

if($row['password']!=$current_password){
	echo "Por favor ingresa tu contraseña valida";
}else{
	mysqli_query($conection,"update users set password='$new_password' where idUsers='$uid'");
	echo "<span style='color: green;'>Contraseña actualizada</span>";
}
?>
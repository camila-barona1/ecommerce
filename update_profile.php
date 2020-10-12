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
$name=get_safe_value($conection,$_POST['name']);
$uid=$_SESSION['USER_ID'];
mysqli_query($conection,"update users set nombre='$name' where idUsers='$uid'");
$_SESSION['USER_NAME']=$name;
echo "<span style='color: green;'>Tu nombre ha sido actualizado</span>";
?>
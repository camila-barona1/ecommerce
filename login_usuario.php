<?php
require('conexion.php');
require('functions.inc.php');

// prx($_POST);

$login_name=get_safe_value($conection,$_POST['login_name']);
$login_password=  get_safe_value($conection,$_POST['login_password']);

$res=mysqli_query($conection, "SELECT * FROM users WHERE email= '$login_name'");
$check_user=mysqli_num_rows($res);
if ($check_user>0) {
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']=true;
	$_SESSION['USER_ID']=$row['idUsers'];
	$_SESSION['USER_NAME']=$row['nombre'];
 echo "valid";
}else{
	echo "wrong";
}

?>
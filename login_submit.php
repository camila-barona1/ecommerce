<?php
require('conexion.php');
require('functions.inc.php');

$email=get_safe_value($conection,$_POST['email']);
$password= md5(get_safe_value($conection,$_POST['password']));

$res=mysqli_query($conection,"select * from users where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$row['idUsers'];
	$_SESSION['USER_NAME']=$row['nombre']; 
	$_SESSION['USER_EMAIL']=$row['email'];

	
	if (isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!='') {
		wishlist_add($conection,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
		unset($_SESSION['WISHLIST_ID']);
	}
	echo "valid";
}else{ 
	echo "wrong";
}
?>
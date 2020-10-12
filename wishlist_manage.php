<?php
require('conexion.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


$pid=get_safe_value($conection,$_POST['pid']);
$type=get_safe_value($conection,$_POST['type']);

if (isset($_SESSION['USER_LOGIN'])) {
	
	$uid=$_SESSION['USER_ID'];
	if (mysqli_num_rows(mysqli_query($conection, "select * from lista_deseos where user_id='$uid' and producto_id='$pid'"))>0) {
		// echo "Ya";
		?>
		<script type="text/javascript">
			alert("Producto ya añadido");
		</script>
		<?php
	}else{
		// $added_on=date('Y-m-d h:i:s'); 
		// mysqli_query($conection, "insert into lista_deseos(user_id,producto_id ,added_on) values('$uid','$pid','$added_on')");
		 wishlist_add($conection,$uid,$pid);
	}
    echo $total_record=mysqli_num_rows(mysqli_query($conection, "select * from lista_deseos where user_id='$uid'"));
}else{
	$_SESSION['WISHLIST_ID']=$pid;
	echo "not_login";
}
?>
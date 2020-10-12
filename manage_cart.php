<?php
require('conexion.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


$pid=get_safe_value($conection,$_POST['pid']);
$qty=get_safe_value($conection,$_POST['qty']);
$type=get_safe_value($conection,$_POST['type']);

$productoVendidoByProductId=productoVendidoByProductId($conection,$pid);
$productoCantidad=productoCantidad($conection,$pid);

$cantidad_pendiente=$productoCantidad-$productoVendidoByProductId;

if ($qty>=$cantidad_pendiente) {
	echo "not_avaliable";
	die();
}


if ($qty=='') {
	$qty=1;
}

$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid,$qty);
	if (isset($_SESSION['USER_ID'])) {
		$uid=$_SESSION['USER_ID'];
		$added_on=date('Y-m-d h:i:s'); 
		mysqli_query($conection, "insert into carrito_compra(user_id,producto_id ,added_on) values('$uid','$pid','$added_on')");
	}
}

if($type=='remove'){
	$obj->removeProduct($pid); 
	if (isset($_SESSION['USER_ID'])) {
	$uid=$_SESSION['USER_ID'];
	mysqli_query($conection,"delete from carrito_compra where producto_id='$pid' and user_id='$uid'");
}
}

if($type=='update'){
	$obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();
?>
<?php 
date_default_timezone_set('America/Bogota'); 

function get_safe_value($conection,$str)
{
	if ($str!='') {
		$str=trim($str);
		return mysqli_real_escape_string($conection,$str);
	}
	
}

function prx($arr)
{
	echo "<pre>";
	print_r($arr);
	die();
}

function productoVendidoByProductId($conection,$pid)
{
	$sql="SELECT SUM(detalle_orden.cantidad) AS qty FROM detalle_orden, `orden` WHERE `orden`.idOrden=detalle_orden.id_orden AND detalle_orden.producto_id=$pid AND `orden`.orden_status!=4";
	$res=mysqli_query($conection,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}
 ?>
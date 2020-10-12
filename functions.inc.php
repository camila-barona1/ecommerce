<?php 

// include "conexion.php";

date_default_timezone_set('America/Bogota'); 
function pr($arr)
{
	echo "<pre>";
	print_r($arr);
}

function prx($arr)
{ 
	echo "<pre>";
	print_r($arr);
	die();
}
function get_safe_value($conection,$str)
{
	if ($str!='') {
		$str=trim($str);
		return mysqli_real_escape_string($conection,$str);
	}
	
}

function get_product($conection,$limit='',$categoria_id='',$producto_id='', $search_str='',$sort_order='')
{
	

	$sql="select productos.*, categorias.categoria from productos,categorias where productos.status=1 ";
	if ($categoria_id!='') {
		$sql.=" and productos.categoria_id=$categoria_id ";
	}
	if ($producto_id!='') {
		$sql.=" and productos.idProductos=$producto_id ";
	}
	$sql.=" and productos.categoria_id=categorias.idCategorias ";
	if ($search_str!='') {
		$sql.=" and (productos.nombre like '%$search_str%' or productos.descripcion like '%$search_str%') ";
	}
	if ($sort_order!='') {
		$sql.=$sort_order;
	}else{
		$sql.=" order by idProductos desc ";
	}
	if ($limit!='') {
		$sql.=" limit $limit";
	}
	// echo $sql;
	$res=mysqli_query($conection,$sql);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$data[]=$row;
	}
	return $data;
}

function wishlist_add($conection,$uid,$pid)
{
	$added_on=date('Y-m-d h:i:s'); 
	mysqli_query($conection, "insert into lista_deseos(user_id,producto_id ,added_on) values('$uid','$pid','$added_on')");
}

function productoVendidoByProductId($conection,$pid)
{
	$sql="SELECT SUM(detalle_orden.cantidad) AS qty FROM detalle_orden, `orden` WHERE `orden`.idOrden=detalle_orden.id_orden AND detalle_orden.producto_id=$pid AND `orden`.orden_status!=4 AND ((`orden`.modo_pago='PayPal' AND `orden`.pago_status='Exitoso') OR (`orden`.modo_pago='Pago_Contra_Entrega' AND `orden`.pago_status!=''))";
	$res=mysqli_query($conection,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}

function productoCantidad($conection,$pid)
{
	$sql="SELECT existencia FROM productos WHERE idProductos=$pid";
	$res=mysqli_query($conection,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['existencia'];
}

 /**RECOVER PASSWORD**/
 
 function resetPassword($token)
 {
 	 $host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'pos_system';
	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}
 	$sql2 = "SELECT * FROM users WHERE telefono='$token'";
 	$result = mysqli_query($conection, $sql2);
 	$usert = mysqli_fetch_assoc($result);
 	$_SESSION['email'] = $usert['email'];
  	?>
    <script type="text/javascript">
       window.location.href='reset_password.php';
     </script>
     <?php
 	exit(0);
 }

 ?>
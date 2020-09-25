<?php 

// include "conexion.php";

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

function get_product($conection,$limit='',$categoria_id='',$producto_id='')
{

	$sql="select productos.*, categorias.categoria from productos,categorias where productos.status=1 ";
	if ($categoria_id!='') {
		$sql.=" and productos.categoria_id=$categoria_id ";
	}
	if ($producto_id!='') {
		$sql.=" and productos.idProductos=$producto_id ";
	}
	$sql.=" and productos.categoria_id=categorias.idCategorias ";
	$sql.=" order by idProductos asc";
	
	if ($limit!='') {
		$sql.=" limit $limit";
	}
	$res=mysqli_query($conection,$sql);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$data[]=$row;
	}
	return $data;
}
 ?>
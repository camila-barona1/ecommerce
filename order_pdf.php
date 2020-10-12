<?php
include('vendor/autoload.php');
require('conexion.php');
require('functions.inc.php');

	if(!isset($_SESSION['USER_ID'])){
		die();
	}


$order_id=get_safe_value($conection,$_GET['id']);

$css=file_get_contents('css/bootstrap.min.css');
$css.=file_get_contents('style.css');

$html='<div class="wishlist-table table-responsive">
<table>
   <thead>
      <tr>
         <th class="product-thumbnail">Nombre</th>
         <th class="product-thumbnail">Imagen</th>
         <th class="product-thumbnail">Cantidad</th>
         <th class="product-name">Precio</th>
         <th class="product-price">Precio Total</th>
      </tr>
   </thead>
   <tbody>';

			$uid=$_SESSION['USER_ID'];
			$res=mysqli_query($conection,"SELECT distinct(detalle_orden.idDetalle), detalle_orden.*, productos.nombre,productos.imagen FROM detalle_orden, productos, `orden` WHERE detalle_orden.id_orden='$order_id' and orden.user_id='$uid' and detalle_orden.producto_id=productos.idProductos");
		
		$total_price=0;
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
		$total_price=$total_price+($row['cantidad']*$row['precio']);
		 $pp=$row['cantidad']*$row['precio'];
         $html.='<tr>
            <td class="product-name">'.$row['nombre'].'</td>
            <td class="product-name"> <img width="20%" src="'."media/productos/".$row['imagen'].'"></td>
            <td class="product-name">'.$row['cantidad'].'</td>
            <td class="product-name">'.$row['precio'].'</td>
            <td class="product-name">'.$pp.'</td>
         </tr>';
		 }

     $html.='<tr>
				<td colspan="3"></td>
				<td class="product-name">Total Price</td>
				<td class="product-name">'.$total_price.'</td>
				
			</tr>';
		 
      $html.='</tbody>
   </table>
</div>';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>

<?php 
function get_safe_value($conection,$str)
{
	if ($str!='') {
		$str=trim($str);
		return mysqli_real_escape_string($conection,$str);
	}
	
}
 ?>
<?php 
session_start();


include "../conexion.php";	
require('functions.inc.php');
$order_id=get_safe_value($conection, $_GET['id']);

if (isset($_POST['update_order_status'])) {
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($conection,"update `orden` set orden_status='$update_order_status',pago_status='Exitoso' where idOrden='$order_id'");
	}else{
		mysqli_query($conection,"update `orden` set orden_status='$update_order_status' where idOrden='$order_id'");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Lista Categorias</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<!-- Header -->
	<?php include "includes/header.php"; ?>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	
	<!-- SIDEBAR --->
	<?php include "includes/sidebar.php"; ?>


	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
							<!-- <a href="#" class="btn-block" data-toggle="modal" data-target="#Medium-modal" type="button">
							</a> -->
							

							<div class="pd-ltr-20 xs-pd-20-10">
								<div class="min-height-200px">
									<div class="page-header">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="title">
													<h4>DataTable</h4>
												</div>
												<nav aria-label="breadcrumb" role="navigation">
													<ol class="breadcrumb">
														<li class="breadcrumb-item"><a href="lista_ordenes.php">Lista Ordenes</a></li>
														<li class="breadcrumb-item active" aria-current="page">Detalle Ordenes</li>
													</ol>
												</nav>
											</div>

										</div>
									</div>
									<!-- Simple Datatable start -->

									<!-- Simple Datatable End -->
									<!-- multiple select row Datatable start -->
									<div class="pd-20 card-box mb-30">
										<div class="clearfix mb-20">
											<div class="pull-left">
												<h4 class="text-blue h4">Categorias</h4>

											</div>
										</div>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Imagen</th>
													<th>Cantidad</th>
													<th>Precio</th>
													<th>Precio Total</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$res=mysqli_query($conection, "select distinct(detalle_orden.idDetalle) ,detalle_orden.*,productos.nombre,productos.imagen,`orden`.`direccion`,`orden`.`ciudad`,`orden`.`codigo_postal`,`orden`.`orden_status` from detalle_orden,productos ,`orden` where detalle_orden.id_orden='$order_id' and  detalle_orden.producto_id=productos.idProductos GROUP by detalle_orden.idDetalle");
												$precio_total=0;
												$userInfo=mysqli_fetch_assoc(mysqli_query($conection,"select * from `orden` where idOrden='$order_id'"));

												$ciudad=$userInfo['ciudad'];
													$direccion=$userInfo['direccion'];
													$codigo_postal=$userInfo['codigo_postal'];
													// $orden_status=$row['orden_status'];

												while ($row=mysqli_fetch_assoc($res)) {
													

													$precio_total=$precio_total+($row['cantidad']*$row['precio']);
													?>

													<tr>
														<td><?php echo $row['nombre'];  ?></td>

														<td><img width="55px" src="<?php echo "../../media/productos/".$row['imagen'] ?>" alt="full-image"></td>

														<td><span class="amount"><?php echo $row['cantidad'];  ?></span></td>
														<td >$<?php echo $row['precio'];  ?></td>
														<td >$<?php echo $row['cantidad']*$row['precio'];  ?></td>


													</tr>
												<?php } ?>
												<tr>
													<td colspan="3"></td>
													<td>Precio Total</td>
													<td>$<?php echo $precio_total;  ?></td>
												</tr>
											</tbody>
										</table>
										<div class="collapse collapse-box" id="striped-table">


										</tbody>

									</table>
									

								</div>
								<div id="address_details">
										<strong>Direccion</strong>
										<?php echo $direccion; ?>, <?php echo $ciudad; ?>, <?php echo $codigo_postal; ?><br><br>
										<strong>Orden Status</strong>
										<?php 
										$order_status_arr=mysqli_fetch_assoc(mysqli_query($conection,"select orden_status.nombre from orden_status,`orden` where `orden`.idOrden='$order_id' and `orden`.orden_status=orden_status.idOrdenStatus"));
										echo $order_status_arr['nombre']; 
										?>
									</div>
									<div>
										<form method="post">
											<select class="custom-select col-12" name="update_order_status">
									<option>Selecciona status</option>
									<?php 
		                            $res = mysqli_query($conection," select * from orden_status");
									
									while ($row=mysqli_fetch_assoc($res)) {
										// if ($row['idOrdenStatus']==$categoria_id) {
										// 	echo "<option selected value=".$row['idOrdenStatus'].">".$row['nombre']."</option>";
										// }else{
											echo "<option value=".$row['idOrdenStatus'].">".$row['nombre']."</option>";
										// }
										
									}
									 ?>
									 	<input type="submit" class="btn btn-outline-success" name="Submit">
								</select>
										</form>
									</div>
							</div>
							<!-- multiple select row Datatable End -->
							<!-- Checkbox select Datatable start -->

							<!-- Checkbox select Datatable End -->
							<!-- Export Datatable start -->

							<!-- Export Datatable End -->
						</div>
						<div class="footer-wrap pd-20 mb-20 card-box">
				Admin Panel Cavis HomeStore 
				<a style="text-decoration: none; color: black">| Version 1.0</a>
				<!-- <a href="https://github.com/dropways" target="_blank">Version 1.0</a> -->
			</div>
					</div>
				</div>
			</div>
			<!-- js -->
			<script src="vendors/scripts/core.js"></script>
			<script src="vendors/scripts/script.min.js"></script>
			<script src="vendors/scripts/process.js"></script>
			<script src="vendors/scripts/layout-settings.js"></script>
			<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
			<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
			<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
			<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
			<!-- buttons for Export datatable -->
			<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
			<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
			<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
			<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
			<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
			<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
			<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
			<!-- Datatable Setting js -->
			<script src="vendors/scripts/datatable-setting.js"></script>


		</body>
		</html>
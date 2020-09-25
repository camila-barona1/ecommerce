<?php 
	session_start();
// function prx($arr)
// 	{
// 		echo "<pre>";
// 		print_r($arr);
// 		die();
// 	}

	
	$categoria_id='';
	$nombre='';
	$descripcion='';
	$precio='';
	$existencia='';
	$imagen='';
	$meta_title='';
	$meta_desc='';
	$meta_keyword='';

	include "../conexion.php";

	require('functions.inc.php');

	$msg='';
	$image_required='required';

	if (isset($_GET['id']) && $_GET['id']!='') {
		$image_required='';
		$id= get_safe_value($conection,$_GET['id']);
		$res = mysqli_query($conection," select * from productos where idProductos='$id'");
		$check=mysqli_num_rows($res);
		if ($check>0) {
			$row=mysqli_fetch_assoc($res);
		$categoria_id=$row['categoria_id'];
		$nombre=$row['nombre'];
		$descripcion=$row['descripcion'];
		$precio=$row['precio'];
		$existencia=$row['existencia'];

		}else{
			header('location:lista_productos.php');
		die();
		}
		
	}

	if (isset($_POST['submit'])) {
		$categoria_id= get_safe_value($conection,$_POST['categoria_id']);
		$nombre= get_safe_value($conection,$_POST['nombre']);
		$descripcion= get_safe_value($conection,$_POST['descripcion']);
		$precio= get_safe_value($conection,$_POST['precio']);
		$existencia= get_safe_value($conection,$_POST['cantidad']);


		$res = mysqli_query($conection,"select * from productos where nombre='$nombre'");
		$check=mysqli_num_rows($res);
		if ($check>0) {
	      if (isset($_GET['id']) && $_GET['id']!='') {
		  $getData=mysqli_fetch_assoc($res);
		    if ($id==$getData['idProductos']) {
			# code...
		}else{
			$msg="Ya existe este producto";

		}

		}else{
			$msg="Ya existe este producto";
		}
	}

	// if ($_FILES['imagen']['type']!='image/jpeg' && $_FILES['imagen']['type']!='image/png' && $_FILES['imagen']['type']!='image/jpg' && $_FILES['imagen']['type']!='image/gif') {
	// 	$msg ="Porfavor Selecciona solo formato png, jpg, jpeg y gif formato";
	// }
// prx($_FILES);
		if ($msg=='') {
	if (isset($_GET['id']) && $_GET['id']!='') {

			if ($_FILES['imagen']['name']!='') {
				$image = rand(111111111,999999999).'_'.$_FILES['imagen']['name'];
		        move_uploaded_file($_FILES['imagen']['tmp_name'], '../../media/productos/'.$image);
		        $update_sql="update productos set nombre='$nombre', descripcion='$descripcion', precio=$precio, existencia=$existencia,categoria_id=$categoria_id,imagen='$image' where idProductos='$id'";

		    }else{
		        $update_sql="update productos set nombre='$nombre', descripcion='$descripcion', precio=$precio, existencia=$existencia,categoria_id=$categoria_id where idProductos='$id'";
		    }
			
		mysqli_query($conection,$update_sql);

	}else{
		$image = rand(111111111,999999999).'_'.$_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], '../../media/productos/'.$image);

		mysqli_query($conection,"insert into productos(nombre,descripcion,precio,existencia,categoria_id,status,imagen) values ('$nombre','$descripcion','$precio','$existencia','$categoria_id', '1', '$image')");


		}
		header('location:lista_productos.php');
		die();
	}
	
}

	


 ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Inicio</title>

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

		<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="lista_productos.php">Lista productos</a></li>
									<li class="breadcrumb-item active" aria-current="page">Registro Productos</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>


	         <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Productos</h4>
						</div>
					</div>
					<div class="alert" style="color: red"><?php echo $msg ?></div>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Categoria</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="categoria_id">
									<option>Selecciona</option>
									<?php 
		                            $res = mysqli_query($conection," select idCategorias, categoria from categorias");
									
									while ($row=mysqli_fetch_assoc($res)) {
										if ($row['idCategorias']==$categoria_id) {
											echo "<option selected value=".$row['idCategorias'].">".$row['categoria']."</option>";
										}else{
											echo "<option value=".$row['idCategorias'].">".$row['categoria']."</option>";
										}
										
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nombre</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="nombre producto" value="<?php echo $nombre ?>" name="nombre">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Descripcion</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" type="text" placeholder=""  name="descripcion"><?php echo $descripcion; ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Precio</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="number" placeholder="" value="<?php echo $precio ?>" name="precio">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Cantidad</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="number" placeholder="" value="<?php echo $existencia; ?>" name="cantidad">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Imagen</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" <?php echo $image_required; ?> type="file" name="imagen">
							</div>
						</div>
                        <button type='button' class='btn btn-info'><a style='color:white;' href='lista_productos.php'>Cancelar</a></button>
						<button type="submit" name="submit" class="btn btn-outline-secondary">Guardar</button>
						
						</div>

					</form>


		

		
		<div class="footer-wrap pd-20 mb-20 card-box">
			DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
		</div>
	</div> 
</div>
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard.js"></script>
</body>
</html>
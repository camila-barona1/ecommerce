<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['cedula']) || empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['correo']) || empty($_POST['rol']) || empty($_POST['telefono']) || empty($_POST['clave']) || empty($_POST['genero']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$cedula = $_POST['cedula'];
			$nombre = $_POST['nombre'];
			$apellidos  = $_POST['apellidos'];
			$correo   = $_POST['correo'];
			$telefono  = $_POST['telefono'];
			$genero   = $_POST['genero'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];


			$query = mysqli_query($conection,"SELECT * FROM usuarios_admin WHERE correo = '$correo' ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo ya existe.</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO usuarios_admin(cedula, nombres,apellidos,clave,rol,correo,telefono,genero)
																	VALUES('$cedula','$nombre','$apellidos','$clave','$rol','$correo','$telefono','$genero')");
				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}

			}


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
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Registro Usuarios</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

<div class="login-box bg-white box-shadow border-radius-10">
	<div align="center">
							<h3>Registro Usuarios</h3>
						</div>
	<form action="" method="post">
		
			
		<br>
		<div style="color: red;"><?php echo isset($alert) ? $alert : ''; ?></div>
			<div class="row">
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Cedula</label>
						<input type="number" name="cedula" class="form-control">
					</div>
				</div>
				
			</div>
			<div class="row">
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Nombres</label>
						<input type="text" name="nombre" class="form-control">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Apellidos</label>
						<input type="text" name="apellidos" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-12 col-sm-12">
					<div class="form-group">
						<label>Correo Electronico</label>
						<input type="email"  name="correo" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Telefono</label>
						<input type="tel" name="telefono" class="form-control">
					</div>
				</div>

							<div class="col-md-6 col-sm-12">
							<label class="col-sm-12 col-md-2 col-form-label">Genero</label>
							<div >
								<select name="genero" class="custom-select col-12">
									<option selected=""></option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
							</div>
						</div>
				



			</div>
			<div class="row">
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Clave</label>
						<input type="text" name="clave" class="form-control">
					</div>
				</div>

				<?php 

					$query_rol = mysqli_query($conection,"SELECT * FROM roles");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>
				<div class="col-md-6 col-sm-12" name="rol">
							<label class="col-sm-12 col-md-2 col-form-label">Rol</label>
							<div >
								<select name="rol" class="custom-select col-12">
								<?php 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
									<option value="<?php echo $rol["idRoles"]; ?>"><?php echo $rol["rol"] ?></option>
									<?php 
								# code...
							}
							
						}
					 ?>
								</select>
							</div>
						</div>
				
			</div>
			<!-- <button type="button" class="btn btn-info">Crear Usuario</button> -->
			<div style="align-items: center;padding: 0 0px 0 85px;">
			<div class="col-md-12 col-sm-12" >
					<input type="submit" class="btn btn-outline-success" value="Crear usuario" >
				</div>
			</div>
			
			
		</form>
	
</div>

		

		
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
<?php 
	session_start();
	
	
	include "conexion.php";

	
	if(!empty($_POST))
	{
		$alert='';
		$alertpassword='';

		if(empty($_POST['cedula']) || empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['correo']) || empty($_POST['rol']) || empty($_POST['telefono']) || empty($_POST['clave']) || empty($_POST['conficlave']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';

		}else{

			
			$cedula = $_POST['cedula'];
			$nombre = $_POST['nombre'];
			$apellidos  = $_POST['apellidos'];
			$correo   = $_POST['correo'];
			$telefono  = $_POST['telefono'];
		    $clave  = md5($_POST['clave']);
			$conficlave  = md5($_POST['conficlave']);
			$rol    = $_POST['rol'];

			
			$query = mysqli_query($conection,"SELECT * FROM usuarios_admin WHERE correo = '$correo' ");
			$result = mysqli_fetch_array($query);

			
		
				if ($clave!=$conficlave) {
					$alertpassword='<p class="msg_error">Las constraseñas deben ser iguales</p>';

			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO usuarios_admin(cedula, nombres,apellidos,clave,rol,correo,telefono)
																	VALUES('$cedula','$nombre','$apellidos','$clave','$rol','$correo','$telefono')");
				if($query_insert){
					$alert='<p style="color:green;" class="msg_save">Usuario creado correctamente.</p>';
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
	<title>Registrase</title>

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
	<!-- <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css"> -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style type="text/css">
		.wizard-content{
			padding: 20px;
		}
	</style>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<!-- <img src="vendors/images/deskapp-logo.svg" alt=""> -->
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="index.php">Inicio Sesion</a></li>
				</ul>
			</div>
			
			
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form class="tab-wizard2 wizard-circle wizard" method="POST" action="">
								<div style="color: red;"><?php echo isset($alert) ? $alert : ''; ?></div>
								<h5>Información basica</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Correo Electornico*</label>
											<div class="col-sm-8">
												<input type="email"  name="correo" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Contraseña*</label>
											<div class="col-sm-8">
												<input type="password" name="clave" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Confirmar Contraseña*</label>
											<div class="col-sm-8">
												<input type="password" name="conficlave" class="form-control">
											</div>
											
										</div>
										<div style="color: red;"><?php echo isset($alertpassword) ? $alertpassword : ''; ?></div>
									</div>
								</section>
								<!-- Step 2 -->
								<h5>Personal Information</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Cedula*</label>
											<div class="col-sm-8">
												<input type="number" name="cedula" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nombres*</label>
											<div class="col-sm-8">
												<input type="text" name="nombre" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Apellidos*</label>
											<div class="col-sm-8">
												<input type="text" name="apellidos" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Telefono</label>
											<div class="col-sm-8">
												<input type="number" name="telefono" class="form-control">
											</div>
										</div>
										<?php 

											$query_rol = mysqli_query($conection,"SELECT * FROM roles");
											mysqli_close($conection);
											$result_rol = mysqli_num_rows($query_rol);

										 ?>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Rol</label>
											<div class="col-sm-8">
												<select class="form-control selectpicker" name="rol" title="Seleccion el rol">
													<?php 
														if($result_rol > 0)
														{
															while ($rol = mysqli_fetch_array($query_rol)) {
													?>
																	<option value="<?php echo $rol["idRoles"]; ?>"><?php echo $rol["rol"] ?></option>
																	<?php 
															}
														}
													 ?>
													<input type="submit" class="btn btn-primary"></input>
												</select>
											</div>
										</div>
									</div>
								</section>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<!-- <script src="vendors/scripts/script.min.js"></script> -->
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<!-- <script src="src/plugins/jquery-steps/jquery.steps.js"></script> -->
	<!-- <script src="vendors/scripts/steps-setting.js"></script> -->
</body>

</html>
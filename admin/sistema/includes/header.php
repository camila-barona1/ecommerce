<?php 

	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
	function fechaC(){
		$mes = array("","Enero", 
					  "Febrero", 
					  "Marzo", 
					  "Abril", 
					  "Mayo", 
					  "Junio", 
					  "Julio", 
					  "Agosto", 
					  "Septiembre", 
					  "Octubre", 
					  "Noviembre", 
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}
 ?>
 <style type="text/css">
 	@media only screen and (max-width: 600px) {
  .example {
  	font-size: 7pt;
  	display: inline-block;
  }
}
 </style>
<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			
			<!-- <div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div> -->
			<p style="padding-top: 15px;
    padding-left: 30px;" class="example">Cali, <?php echo fechaC(); ?></p>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/user.png" alt="">
						</span>
 
				<?php
				include "../conexion.php";	
				 $uid= $_SESSION['idUser'];
				$query = mysqli_query($conection,"SELECT u.idUsuario, r.rol FROM usuarios_admin u INNER JOIN roles r ON u.rol = r.idRoles WHERE u.idUsuario='$uid' 
				"); 
				$result = mysqli_num_rows($query);
				$data = mysqli_fetch_array($query);
				
				 ?>
						<span class="user-name"><?php echo $_SESSION['nombres'].' - '.$data['rol'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="help.php"><i class="dw dw-help"></i> Ayuda</a>
						<a class="dropdown-item" href="salir.php"><i class="dw dw-logout"></i> Salir</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
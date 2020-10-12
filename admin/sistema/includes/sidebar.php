<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<!-- <img src="vendors/images/menu.png" alt="" class="dark-logo"> -->
				<img width="150px" style="margin-top: 20px; margin-left: 20px; margin-bottom: 10px"  src="vendors/images/Imagen2.png">
			</a>
			<div class="close-sidebar" data-toggle="center-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Inicio</span>
						</a>
						
					</li>
					<!-- USUARIOS -->
					<?php if ($_SESSION['rol'] ==1) {
				
				 ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-13"></span><span class="mtext">Funcionarios</span>
						</a>
						<ul class="submenu">
							<li><a href="registro_admins.php">Nuevo Funcionarios</a></li>
							<li><a href="lista_admins.php">Lista Funcionarios</a></li>
						</ul>
					</li>
					<?php } ?>
					<!-- CATEGORIA -->
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Categorias</span>
						</a>
						<ul class="submenu">
							<li><a href="registro_categorias.php">Nueva Categoria</a></li>
							<li><a href="lista_categorias.php">Lista Categorias</a></li>
						</ul>
					</li>
					<!-- PRODUCTOS -->
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shopping-cart-1"></span><span class="mtext">Productos</span>
						</a>
						<ul class="submenu">
							<li><a href="registro_productos.php">Nuevo producto</a></li>
							<li><a href="lista_productos.php">Lista productos</a></li>
						</ul>
					</li>
					<li>
						<a href="lista_usuarios.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Usuarios</span>
						</a>
					</li>
					<li>
						<a href="lista_ordenes.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-startup"></span><span class="mtext">Ordenes</span>
						</a>
					</li>
					<li>
						<a href="lista_contactos.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-2"></span><span class="mtext">Contactos</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-file-146"></span><span class="mtext">Reportes</span>
						</a>
						<ul class="submenu">
							<li><a href="reporte_ordenes.php">Ordenes</a></li>
							<li><a href="reporte_contactos.php">Contactos</a></li>
							<li><a href="reporte_usuarios.php">Usuarios</a></li>
							<li><a href="reporte_productos.php">Productos</a></li>

							<li><a href="reporte_administrador.php">Funcionarios</a></li>
							<li><a href="reporte_categorias.php">Categorias</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
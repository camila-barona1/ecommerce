<?php  
require('conexion.php'); 
require('functions.inc.php');
require('add_to_cart.inc.php');


$categorias_res=mysqli_query($conection, "select * from categorias where status=1");
$cate_array=array();
while ($row=mysqli_fetch_assoc($categorias_res)) {
    $cate_array[]=$row;
}

   $obj = new add_to_cart();
   $totalProduct=$obj->totalProduct();

if (isset($_SESSION['USER_LOGIN'])) {
      $uid=$_SESSION['USER_ID'];
    if (isset($_GET['lista_deseosid'])) {
       
    $lista_deseos_id=$_GET['lista_deseosid'];
    mysqli_query($conection,"DELETE from lista_deseos where idListaDeseos='$lista_deseos_id' and user_id='$uid'");
}
   
   $wishlist_count=mysqli_num_rows(mysqli_query($conection,"SELECT productos.nombre, productos.imagen, productos.precio, lista_deseos.idListaDeseos from productos, lista_deseos where lista_deseos.producto_id=productos.idProductos and lista_deseos.user_id='$uid'"));
}

/********/
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
    <style type="text/css">
    .htc__shopping__cart a span.htc__wishlist {
    background: #c43b68;
    border-radius: 100%;
    color: #fff;
    font-size: 9px;
    height: 17px;
    line-height: 19px;
    position: absolute;
    right: 20px;
    text-align: center;
    top: -4px;
    width: 17px;
}
    </style>

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img width="68%" src="images/logo/logo_full.jpg" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Inicio</a></li>
                                        <?php 
                                        foreach ($cate_array as $list) {
                                           ?>
                                        <li><a href="categorias.php?id=<?php echo $list['idCategorias']; ?>"><?php echo $list['categoria']; ?></a></li>

                                           <?php
                                        }
                                         ?>
                                        <!-- <li><a href="contactos.php">contactenos</a></li> -->
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Inicio</a></li>
                                           <?php 
                                        foreach ($cate_array as $list) {
                                           ?>
                                        <li><a href="categorias.php?id=<?php echo $list['idCategorias']; ?>"><?php echo $list['categoria']; ?></a></li>

                                           <?php
                                        }
                                         ?>
                                            <li><a href="contactos.php">contactenos</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <?php 
                                    $class="mr15";
                                    if(isset($_SESSION['USER_LOGIN'])){
                                        $class="";
                                    }
                                    ?>
                                    <div class="header__search search search__open <?php echo $class?>">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    
                                    <div class="header__account">
                                        <?php if(isset($_SESSION['USER_LOGIN'])){
                                            ?>
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                              </button>

                                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mr-auto">
                                                  <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: capitalize;">
                                                    mi cuenta
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                      <a class="dropdown-item" href="my_order.php">Orden</a>
                                                      <a class="dropdown-item" href="profile.php">Perfil</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="logout.php">Salir</a>
                                                    </div>
                                                  </li>
                                                  
                                                </ul>
                                              </div>
                                            </nav>
                                            <?php
                                        }else{
                                            echo '<a href="login.php" class="mr15">Acceder/Registrarse</a>';
                                        }
                                        ?>
                                    
                                        
                                        
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <?php
                                        if(isset($_SESSION['USER_ID'])){
                                        ?>
                                        <a href="wishlist.php" class="mr15"><i class="icon-heart icons"></i></a>
                                        <a href="wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count?></span></a>
                                        <?php } ?>
                                        <a href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
         <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Busque aquí... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
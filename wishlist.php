<?php 
require('top.php');
// include_once('functions.inc.php');
if (!isset($_SESSION['USER_LOGIN'])) {
   ?>
   <script type="text/javascript">
       window.location.href='index.php';
   </script>
   <?php
}
$uid=$_SESSION['USER_ID'];


$res=mysqli_query($conection,"SELECT productos.nombre, productos.imagen, productos.precio, lista_deseos.idListaDeseos from productos, lista_deseos where lista_deseos.producto_id=productos.idProductos and lista_deseos.user_id='$uid'");

 ?>
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.png) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Lista Deseos</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while ($row=mysqli_fetch_assoc($res)) {
                                            # code...
                                        

                                         ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo "media/productos/".$row['imagen'] ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['nombre']; ?></a>
                                                <ul  class="pro__prize">
                                                    <!-- <li class="old__prize">$82.5</li> -->
                                                    <li>$<?php echo $row['precio']; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $row['precio']; ?></span></td>
                                            <td class="product-remove"><a href="wishlist.php?lista_deseosid=<?php echo $row['idListaDeseos']?>" ><i class="icon-trash icons"></i></a></td>
                                        <?php 
                                        
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH ?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH ?>checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
 <?php  
require('footer.php'); ?>
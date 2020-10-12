<?php 

require('top.php');
$order_id=get_safe_value($conection, $_GET['id']);

if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}
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
                                  <span class="breadcrumb-item active">Detalle</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
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
                                        <tbody>
                                            <?php 
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($conection, "SELECT distinct(detalle_orden.idDetalle), detalle_orden.*, productos.nombre,productos.imagen FROM detalle_orden, productos, `orden` WHERE detalle_orden.id_orden='$order_id' and orden.user_id='$uid' and detalle_orden.producto_id=productos.idProductos");
                                            $precio_total=0;
                                            while ($row=mysqli_fetch_assoc($res)) {
                                                if ($row['cantidad']==0) {
                                                    $row['cantidad']=1;
                                                }
                                                $precio_total=$precio_total+($row['cantidad']*$row['precio']);
                                             ?>

                                            <tr>
                                                <td class="product-name"><?php echo $row['nombre'];  ?></td>
                                                
                                                <td class="product-name"><img src="<?php echo "media/productos/".$row['imagen'] ?>" alt="full-image"></td>

                                                <td class="product-price"><span class="amount"><?php echo $row['cantidad'];  ?></span></td>
                                                <td class="product-stock-status">$<?php echo $row['precio'];  ?></td>
                                                <td class="product-stock-status">$<?php echo $row['cantidad']*$row['precio'];  ?></td>

                                                
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="product-name">Precio Total</td>
                                                <td class="product-name">$<?php echo $precio_total;  ?></td>
                                            </tr>
                                        </tbody>

                                        
                                    </table>

                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 15px;" class="cr__btn">
                      <a href="my_order.php">Volver</a>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
 <?php  
require('footer.php'); ?>
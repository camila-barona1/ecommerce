<?php 
require('top.php');
// include_once('functions.inc.php');

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
                                  <span class="breadcrumb-item active">Carrito compra</span>
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
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_SESSION['cart'])){
                                        foreach ($_SESSION['cart'] as $key=>$val) {
                                          $productArr=get_product($conection, '','',$key);
                                          $pname=$productArr[0]['nombre'];
                                          $pprecio=$productArr[0]['precio'];
                                          $pimagen=$productArr[0]['imagen'];
                                          $qty=$val['qty'];

                                         ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo "media/productos/".$pimagen ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pname; ?></a>
                                                <ul  class="pro__prize">
                                                    <!-- <li class="old__prize">$82.5</li> -->
                                                    <li>$<?php echo $pprecio; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $pprecio; ?></span></td>
                                            <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php if($qty==0){$qty=1;} echo $qty;  ?>" />
                                                <br><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
                                            </td>
                                            <td class="product-subtotal"><?php echo $qty*$pprecio; {
                                                # code...
                                            } ?></td>
                                            <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></td>
                                        <?php 
                                        
                                        }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH ?>">Continuar Comprando</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH ?>checkout.php">Ir a pagar</a>
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
<?php 
require('top.php');
// include_once('functions.inc.php');

$sort_order='';
$price_high_selected='';
$price_low_selected='';
$new_selected='';
$old_selected='';


$categoria_id=mysqli_real_escape_string($conection,$_GET['id']);
if (isset($_GET['sort'])) {
    $sort=mysqli_real_escape_string($conection,$_GET['sort']);
    if ($sort=='price_high') {
        $sort_order=" order by productos.precio desc ";
        $price_high_selected='selected';
    }
    if ($sort=='price_low') {
        $sort_order=" order by productos.precio asc ";
        $price_low_selected='selected';

    }
    if ($sort=='new') {
        $sort_order=" order by productos.idProductos desc ";
        $new_selected='selected';

    }
    if ($sort=='old') {
        $sort_order=" order by productos.idProductos asc ";
        $old_selected='selected';

    }
}
if ($categoria_id>0) {
    $get_product=get_product($conection,'',$categoria_id,'','',$sort_order);
}else{
    ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
    <?php
}
// prx($get_product);

 ?>
<div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
            <!-- Start Cart Panel -->
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
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
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php 
                    if (count($get_product)>0) {
                    
                     ?>
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="sort_product_drop('<?php echo $categoria_id ?>','<?php echo SITE_PATH ?>')" id="sort_product_id">
                                        <option>Organizar</option>
                                        <option value="price_low" <?php echo $price_low_selected; ?> >Menor precio a Mayor</option>
                                        <option value="price_high" <?php echo $price_high_selected; ?> >Mayor precio a menor</option>
                                        <option value="new" <?php echo $new_selected; ?> >Nuevos</option>
                                        <option value="old" <?php echo $old_selected; ?> >Viejos</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php  
                                        foreach ($get_product as $list) {

                                        ?>
                                        <!-- Start Single Category -->
                                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="producto.php?id=<?php echo $list['idProductos']; ?>">
                                                         <img src= "<?php echo "media/productos/".$list['imagen']; ?>"  alt="product images">
                                                    </a>
                                                </div>
                                               <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['idProductos']?>','add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['idProductos']?>','add')"><i class="icon-handbag icons"></i></a></li>

                                            
                                        </ul>
                                    </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="producto.php?id=<?php echo $list['idProductos']; ?>"><?php echo $list['nombre']; ?></a></h4>
                                                    <h3>Stock: <?php echo $list['existencia']; ?></h3>
                                                    <ul class="fr__pro__prize">
                                                        <!-- <li class="old__prize">$<?php //echo $list['precio']; ?></li> -->
                                                        <li>$<?php echo $list['precio']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Category -->
                                    <?php } ?>
                                        <!-- End Single Product -->
                                        
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <?php  

                                        foreach ($get_product as $list) {

                                        ?>
                                                <!-- Start List Product -->
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.html"><img width="50%" src= "<?php echo "media/productos/".$list['imagen']; ?>"  alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?php echo $list['nombre']; ?></a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize">$<?php echo $list['precio']; ?></li>
                                                            <li>$<?php echo $list['precio']; ?></li>
                                                        </ul>
                                                       
                                                        <p><?php echo $list['descripcion']; ?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['idProductos'] ?>','add')">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <?php } ?>
                                                <!-- End List Product -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                <?php }else{
                    echo "Data no found";
                } ?>
                
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                            <!-- Start Best Sell Area -->
                            <div class="htc__recent__product">

                                <h2 class="title__line--4">Ultimos Productos</h2>
                                <div class="htc__recent__product__inner">
                                    <?php  
                            $get_product_ultimo=get_product($conection,3);
                            foreach ($get_product_ultimo as $list_ultimo) {

                            ?>
                                    <!-- Start Single Product -->
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="producto.php?id=<?php echo $list_ultimo['idProductos']; ?>">
                                                <img src= "<?php echo "media/productos/".$list_ultimo['imagen']; ?>"  alt="product images">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="producto.php?id=<?php echo $list_ultimo['idProductos']; ?>"><?php echo $list_ultimo['nombre']; ?></a></h2>
                                         
                                            <h3>Stock: <?php echo $list_ultimo['existencia']; ?></h3>
                                            <ul  class="pro__prize">
                                                <!-- <li class="old__prize"></li> -->
                                                <li>$<?php echo $list_ultimo['precio']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Best Sell Area -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        
        <!-- End Banner Area -->

 <?php  
require('footer.php'); ?>
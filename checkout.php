<?php 
require('top.php');
// include_once('functions.inc.php');
// $hoy = date("Y-m-d h:i:s"); 
//    echo $hoy;
if (!isset($_SESSION['cart']) || count($_SESSION['cart'])==0) {
   ?>
   <script type="text/javascript">
       window.location.href='index.php';
   </script>
   <?php
}

$cart_total=0;
foreach ($_SESSION['cart'] as $key=>$val) {
    $productArr=get_product($conection, '','',$key);
    $pprecio=$productArr[0]['precio'];
    $qty=$val['qty'];
    if ($qty==0) {
        $qty=1;
        
    }
    $cart_total=$cart_total+($pprecio*$qty);
 }

if (isset($_POST['submit'])) {
    
   $direccion=get_safe_value($conection, $_POST['direccion']);
   $ciudad=get_safe_value($conection, $_POST['ciudad']);
   $codigo_postal=get_safe_value($conection, $_POST['codigo_postal']);
   $modo_pago=get_safe_value($conection, $_POST['modo_pago']);
   $user_id=$_SESSION['USER_ID'];

   $precio_total=$cart_total;
   $pago_status='Pendiente';
   if ($modo_pago=='Pago_Contra_Entrega') {
     $pago_status='Exitoso';
   }
   $orden_status='1';
   $added_on=date('Y-m-d h:i:s');


   mysqli_query($conection, "INSERT INTO orden (user_id,direccion,ciudad,codigo_postal,modo_pago,precio_total,pago_status,orden_status,added_on) VALUES('$user_id','$direccion','$ciudad','$codigo_postal','$modo_pago','$precio_total','$pago_status','$orden_status','$added_on')");

   

$orden_id=mysqli_insert_id($conection);

foreach ($_SESSION['cart'] as $key=>$val) {
    $productArr=get_product($conection, '','',$key);
    $pprecio=$productArr[0]['precio'];
    $qty=$val['qty'];

    if ($qty==0) {
      $qty=1;
    }

    mysqli_query($conection, "INSERT INTO detalle_orden (id_orden,producto_id,cantidad,precio) VALUES('$orden_id','$key','$qty','$pprecio')");

 }
  mysqli_query($conection, "DELETE FROM carrito_compra WHERE user_id='$user_id'");
 
 unset($_SESSION['cart']);
     ?>
   <script type="text/javascript">
       window.location.href='thank_you.php';
   </script>
   <?php
}


?>

 <?php
   
  require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
   // $correo = $_POST["para"];
    if (isset($_POST["para"])) {
        $correo = $_POST["para"];
    
      
   // $mensaje = $_POST["mensaje"];
 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        
        //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
        $mail->Username   = 'cavishomestore@gmail.com';                     // SMTP username
        $mail->Password   = 'hwabagtckgqpcaep';                               // SMTP password
  
        //Recipients
        $mail->setFrom('cavishomestore@gmail.com', 'Cavis HomeStore'); 
        
        //La siguiente linea, se repite N cantidad de veces como destinarios tenga
        $mail->addAddress($correo, $correo);     // Add a recipient
   
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Compra Registrada';
      //  $mail->Body    = $mensaje;
          $mail->Body    = "<strong> Señor(a) ".$_SESSION['USER_NAME'].", <br>Tu compra ha sido registrada con exito! </strong><br>  Con un valor de:".$precio_total."<br>Modo de pago: ".$modo_pago."</p><hr><p style='color: #697ab7; font-size:14pt;'>Gracias por comprar en Cavis HomeStore.</p><br><img src='https://pbs.twimg.com/media/EjmWqyUWkAAnRjk?format=png&name=small'><br> <p style='color: grey; font-size:12pt'>";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
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
                          <a class="breadcrumb-item" href="index.php">Inicio</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">Caja</span>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">

                            <?php 
                            $accordion_class='accordion__title';
                            if(!isset($_SESSION['USER_LOGIN'])){

                                $accordion_class='accordion__hide';

                                ?>
                                <div class="accordion__title">
                                    Inicia Sesion o registrate
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="login-form" method="post">
                                                        <h5 class="checkout-method__title">Inicio sesion</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Correo Electronico</label>
                                                            <input type="text" name="login_email" id="login_email" placeholder="Email*" style="width:100%">
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Contraseña</label>
                                                            <input type="password" name="login_password" id="login_password" placeholder="Contraseña*" style="width:100%">

                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>

                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Acceder</button>
                                                        </div>
                                                    </form>
                                                    <div class="form-output login_msg">
                                                        <p class="form-messege field_error"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="#">
                                                        <h5 class="checkout-method__title">Registrate</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Nombre</label>
                                                            <input type="text" name="name" id="name" placeholder="Nombre*" style="width:100%">
                                                            <span class="field_error" id="name_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-email">Correo Electronico</label>
                                                            <input type="email" name="email" id="email" placeholder="Email*" style="width:100%">
                                                            <span class="field_error" id="email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Telefono</label>
                                                            <input type="tel" name="telefono" id="telefono" placeholder="Telefono*" style="width:100%">
                                                            <span class="field_error" id="telefono_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Contraseña</label>
                                                            <input type="password" name="password" id="password" placeholder="Contraseña*" style="width:100%">
                                                            <span class="field_error" id="password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="registro_usuario()">Registrarme</button>
                                                        </div>
                                                    </form>
                                                    <div class="form-output register_msg">
                                                        <p class="form-messege" style="color: green; font-size: 15pt;"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <div class="<?php echo $accordion_class ?>">
                                 Dirección de envio
                            </div>
                            
                            <div class="accordion__body">
                                <div class="bilinfo">
                                        <div class="row">
                                            <form method="post" >
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Dirección" name="direccion" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Ciudad" name="ciudad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="codigo_postal" placeholder="Codigo Postal" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="<?php echo $accordion_class ?>">
                                Metodo de pago
                            </div>
                            <div class="accordion__body">
                                <div class="paymentinfo">
                                    <div class="single-method">
                                        <label style="font-size: 12pt;">Pago Contra Entrega: </label>&nbsp;
                                        <input style="height: 20px;width: 20px;cursor: pointer;" type="radio" name="modo_pago" value="Pago_Contra_Entrega" required>
                                        <!--- Cash On Delivery -->
                                        &nbsp;&nbsp;&nbsp;
                                        <label style="font-size: 12pt;">PayPal </label>&nbsp;
                                        <input style="height: 20px;width: 20px;cursor: pointer;" type="radio" name="modo_pago" value="PayPal" required>
                                    </div>
                                    <div class="single-method">
                                       
                                    </div>
                                </div>
                            </div>
                             <input type="submit" name="submit" value="Finalizar">
                                <input type="hidden" name="para" value="<?php echo $_SESSION['USER_EMAIL'] ?>">
                        
                        </div>

                    </div>
</form>
                </div>

            </div>

            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Tu pedido</h5>
                    <div class="order-details__item">
                       <?php 
                       $cart_total=0;
                       foreach ($_SESSION['cart'] as $key=>$val) {
                          $productArr=get_product($conection, '','',$key);
                          $pname=$productArr[0]['nombre'];
                          $pprecio=$productArr[0]['precio'];
                          $pimagen=$productArr[0]['imagen'];
                          $qty=$val['qty'];
                          if ($qty==0) {
                              $qty=1;
                          }
                          $cart_total=$cart_total+($pprecio*$qty);
                          ?>
                          <div class="single-item">
                            <div class="single-item__thumb">
                                <img src="<?php echo "media/productos/".$pimagen ?>" alt="ordered item">
                            </div>
                            <div class="single-item__content">
                                <a href="#"><?php echo $pname; ?></a>
                                <span class="price">$<?php  echo $pprecio*$qty;  ?></span>
                            </div>
                            <div class="single-item__remove">
                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                            <!-- <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$909.00</span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$9.00</span>
                                </div>
                            </div> -->
                            <div class="ordre-details__total">
                                <h5>total pedido</h5>
                                <span class="price">$<?php echo $cart_total; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <?php  
        require('footer.php'); ?>
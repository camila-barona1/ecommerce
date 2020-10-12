<?php 
require('emailcontroler.php'); 

require('top.php');
  if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    $sql1 = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conection, $sql1);
    $user = mysqli_fetch_assoc($result);
    $token = $user['telefono'];
    sendPasswordResetLink($email, $token);
    // header('location: password_message.php');
     ?>
    <script type="text/javascript">
        window.location.href='password_message.php';
     </script>
      <?php
    exit(0);
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
                                  <span class="breadcrumb-item active">Recuperar contraseña</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Recuperar contraseña</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form action="forgot_password.php" method="post">
                                    <p>Por favor ingresa tu email para recuperar contraseña</p>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">

                                            <input type="email" name="email" placeholder="Ingresa tu email" style="width:100%">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="submit" name="forgot-password" class="fv-btn">Recuperar</button>
                                    </div>
                                  
                                </form>
                            </div>
                        </div> 
                
                </div>
                
                    
            </div>
        </section>
        <!-- End Contact Area -->
 <?php  
require('footer.php'); ?>
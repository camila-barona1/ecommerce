<?php 
require('top.php');
// include_once('functions.inc.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes') {
    ?>
    <script type="text/javascript">
        window.location.href='my_order.php';
        alert('Bienvenid@ <?php echo $_SESSION['USER_NAME']; ?>');
   
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
                                  <span class="breadcrumb-item active">Iniciar Sesion/Registrarse</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Iniciar Sesion</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="login-form" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="login_email" id="login_email" placeholder="Correo Electronico*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_email_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="login_password" id="login_password" placeholder="Contraseña*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_password_error"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="user_login()">Acceder</button>
                                    </div>
                                </form>
                                <div class="form-output login_msg">
                                    <p class="form-messege field_error" style="font-size: 12pt"></p>
                                </div>
                            <a href="forgot_password.php" style="font-size: 12pt">¿Olvidaste tu contraseña?</a>
                            
                            </div>
                        </div> 
                
                </div>
                

                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Registrarse</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="register-form" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="name" id="name" placeholder="Nombre*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="name_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="email" name="email" id="email" placeholder="Correo Electronico*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="email_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="tel" name="telefono" id="telefono" placeholder="Telefono*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="telefono_error"></span>

                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" id="password" placeholder="Contraseña*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="password_error"></span>

                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="registro_usuario()">rEGISTRARME</button>
                                    </div>
                                </form>
                                <div class="form-output register_msg">
                                    <p class="form-messege" style="color: green; font-size: 15pt;"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                    
            </div>
        </section>
        <!-- End Contact Area -->
 <?php  
require('footer.php'); ?>
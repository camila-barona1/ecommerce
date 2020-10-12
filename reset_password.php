<?php 
require('top.php');
require('emailcontroler.php'); 

if (isset($_POST['reset_password_btn'])) {
        $password = md5($_POST['password']);
        $passwordCof = md5($_POST['passwordCof']);
        
        $email=$_SESSION['email'];
        $sql ="UPDATE users SET `password`='$password' WHERE email='$email' ";
        $result = mysqli_query($conection, $sql);
        if ($result) {
            ?>
    <script type="text/javascript">
        window.location.href='login.php';
     </script>
      <?php
    exit(0);
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
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login/Registrarse</span>
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
                                    <h2 class="title__line--6">Reset Password</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form action="reset_password.php" method="post">
                                    
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="passwordCof"  placeholder="Confirm Password*" style="width:100%">
                                        </div>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="submit" name="reset_password_btn" class="fv-btn">Reset</button>
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
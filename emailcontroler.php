
 <?php
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
 function sendPasswordResetLink($userEmail,$token)
    {
      # code...
   // $correo = $_POST["para"];
  
        $correo = $userEmail;
    
      
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
        $mail->Subject = 'Reset Password';
      //  $mail->Body    = $mensaje;
          $mail->Body    = "<strong> Señor(a), <br> Porfavor ingresa al link para resetear tu contraseña <br> <a href='http://127.0.0.1/systema_pos/index.php?password-token=".$token."'>Reset</a>";
          //cambiarbURL

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    
    
    }
?>
<!-- Start Bradcaump area -->

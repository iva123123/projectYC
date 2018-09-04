<?php
      
       $conf_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
       $conf_code=str_shuffle($conf_code);
       $conf_code = substr($conf_code,0,12);
require 'vendor/autoload.php';
         $mail = new PHPMailer(true);                             
         try {

          $mail->SMTPDebug = 2;
          $mail->isSMTP();                   
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'iva.prifti@fshnstudent.info';       
          $mail->Password = 'ivaiva123123';      
          $mail->SMTPSecure = 'tls'; 
          $mail->Port = 587;                                    
          $mail->setFrom('iva.prifti@fshnstudent.info','YourClique');
          $mail->addAddress($email);  

          $mail->addCC('cc@example.com');
          $mail->addBCC('bcc@example.com');

          $mail->isHTML(true);                                
          $mail->Subject = "Please confirm  your email address!";
          $mail->Body    = "Please click on the link below to confirm your email <br><a href='index.php?controller=users&action=verify'><b>Click here !</b></a>";

          $mail->send();
          echo "you are now registered";

        }
        catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

  header("location: index.php?controller=pages&action=error");

} 
else {
   header("location: index.php?error=$error_msg");
}

?>
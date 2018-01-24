<?php


function sendEmail(){
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  // //Load composer's autoloader
  // require 'vendor/autoload.php';

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

  try {
      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers /*hostindel provedor del correo*/
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = PHPMAILER_USER;                    // SMTP username
      $mail->Password = PHPMAILER_PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('from@example.com', 'Mailer');         //Quien manada el correo
      $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient // Adonde llega el correo
      // $mail->addAddress('ellen@example.com');               // Name is optional
      //
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';   /*Cuerpo del mensaje*/
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  /*En caso de paerosna no puede ver el codigo html*/

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
    /*Hay errores en el envio del correo*/
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}


 ?>

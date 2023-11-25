<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();                                           
  $mail->Host       = 'smtp.gmail.com';                     
  $mail->SMTPAuth   = true;                                 
  $mail->Username   = 'milccpc06135@fpt.edu.vn';                     
  $mail->Password   = 'gsygsdrvlqkwkzvg';                              
  
  $mail->Port       = 587;                                  
  //Recipients
  $mail->setFrom($_POST['email']);
  $mail->addAddress('milccpc06135@fpt.edu.vn');
  //Content
  $mail->isHTML(true);   
 // $mail->Subject = 'Here is the subject';
 // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';                               //Set email format to HTML
  $mail->Subject = $_POST['name'];
 $mail->Body    = $_POST['subject'];
 // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo "
  <script>
  alert ( 'Gửi mail thành công');
  document.location.href ='../index.php?act=contact';
  </script>
  ";
} catch (Exception $e) {
  echo "Không thể gửi mail. Mailer Error: {$mail->ErrorInfo}";
}

?>


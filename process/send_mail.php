<?php 
  $username = 'dangkhachung10k@gmail.com';
  $password = 'fcxmkcjbymckwpha';




  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';


  function sendEmailForAccountAcctive($email, $link){
    //Create an instance; passing `true` enables exceptions

    global $username;
    global $password;
    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->SMTPSecure = 'ssl';          //Enable implicit TLS encryption
    $mail->Port       = 465;  
    $mail->CharSet    = "UTF-8";                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dangkhachung10k@gmail.com', 'Hahalolo');
    $mail->addAddress($email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/Document/Demo.txt');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '[Hahalolo] Kích hoạt tài khoản';
    $mail->Body    = 'Để kích hoạt tài khoản, mời bạn nhấp vào đây!' .$link;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send())
    {
    return true;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  }

?>
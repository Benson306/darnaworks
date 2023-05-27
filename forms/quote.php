<?php

require_once 'assets/PHPMailer/src/Exception.php';
require_once 'assets/PHPMailer/src/PHPMailer.php';
require_once 'assets/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);


$alert = '';

if(isset($_POST['submit_quote'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try{
      $mail->isSMTP();

      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'bnkimtai@gmail.com';
      $mail->Password = 'nhaspnpixlpszcqp'; //Change To Darna Email 
      $mail->SMTPSecure = 'tls';
      $mail->Port =  587;

      $mail->setFrom('info@compleat.co.ke'); //sender
      $mail->addAddress('bnkimtai@gmail.com'); //Recipient

      $mail->isHTML(true);
      $mail->Subject = 'Message Received from Quotation Form: '.$name;
      $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Message: $message";
      
      $mail->send();
      $alert ='<div class="sent-message">Your message has been sent. Thank you!</div>';

    }catch(Exception $e){
      $alert = "<div class='error-message'>Failed To send Message</div>";
    }
}

?>
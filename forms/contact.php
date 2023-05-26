<?php

require_once 'assets/PHPMailer/src/Exception.php';
require_once 'assets/PHPMailer/src/PHPMailer.php';
require_once 'assets/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);


$alert = '';

if(isset($_POST['submit_contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
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
      $mail->Subject = 'Message Received from Contact Form: '.$name;
      $mail->Body = "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message";


      $alert ='<div class="sent-message">Your message has been sent. Thank you!</div>';
      $mail->send();

    }catch(Exception $e){
      $alert = "<div class='error-message'>Failed To send Message</div>";
    }
}

?>
<?php
$pagetitle = "Новая заявка с сайта \"$sitename\"";
if(isset($_POST)){
$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$full_text = trim($_POST["text"]);
$message = "Имя: $name \nТелефон: $phone \nТекст: $full_text";

require './PHPMailer/PHPMailerAutoload.php';
$mail=new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth=true;
$mail->Username='natasha_born';
$mail->Password='1590753born';
$mail->SMTPSecure='TLS';
$mail->Port='587';

$mail->Charset='UTF-8';
$mail->From= 'natasha_born@mail.ru';
$mail->FromName='Natasha';
$mail->addCC('natashaborn3371@gmail.com', 'Natasha');
                  
$mail->isHTML(true);
                  
$mail->Subject=$pagetitle;
$mail->Body=$message;
$mail->AltBody=$message;

if($mail->send()){
    echo 'pismo otpravleno';
}else{
    echo 'pismo ne mojet bit otpravleno';
    echo 'error:'.$mail->ErrorInfo;
}
                  die;
                  }
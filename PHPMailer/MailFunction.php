<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer; 

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'AKIAJHQ3XNEXXHP27ZSA';                 // SMTP username
$mail->Password = 'AoeE41tcpicmrBVhhdVtiA9pUIvKCD7rndYhnsUalQCj';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->IsHTML(true);



$mail->setFrom('hi@imzolo.com', 'Impact Resume Form Lead');
$mail->addAddress('impactresumes@imzolo.com ', '');  
$mail->addAddress('komal@imzolo.com');               
$mail->addAddress('lakhani@imzolo.com');               
// $mail->addAddress('javedahamad4@gmail.com');               
$mail->isHTML(true);            

$mail->Subject = 'Impact resume form lead';
$mail->Body    = 'Impact Resume Form Lead <br/> <p>Name: '.$_POST['FNAME'].'</p><p>Email: '.$_POST['EMAIL'].'</p><p>Number: '.$_POST['number'].'</p><p>Service: '.$_POST['service'].'</p>';

if(!$mail->send()) {
    $arr = array('result' => 'error');
    // echo 'error';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

	$arr = array('result' => 'success');
	echo json_encode($arr);
	// echo 'success';
}

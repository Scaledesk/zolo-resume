<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer; 

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@scaledesk.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  
$mail->IsHTML(true);



$mail->setFrom('contact@scaledesk.com', 'Impact Resume Form Lead');
$mail->addAddress('impactresumes@imzolo.com ', '');  
$mail->addAddress('komal@imzolo.com');               
$mail->addAddress('lakhani@imzolo.com');               
// $mail->addAddress('priyanka@scaledesk.com');               
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

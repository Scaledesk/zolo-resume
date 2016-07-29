<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer; 
$mail1 = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'AKIAJHQ3XNEXXHP27ZSA';                 // SMTP username
$mail->Password = 'AoeE41tcpicmrBVhhdVtiA9pUIvKCD7rndYhnsUalQCj';            // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->IsHTML(true);



$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'email-smtp.us-west-2.amazonaws.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'AKIAJHQ3XNEXXHP27ZSA';                 // SMTP username
$mail1->Password = 'AoeE41tcpicmrBVhhdVtiA9pUIvKCD7rndYhnsUalQCj';           // SMTP password
$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 465;
$mail1->IsHTML(true);  
$mail1->setFrom('hi@imzolo.com', 'imzolo.com');
$mail1->addAddress($_POST['EMAIL'], $_POST['FNAME']);  
$mail1->isHTML(true); 
$mail1->Subject = 'Thank you for contacting us';
$mail1->Body    = 'Hi '.$_POST['FNAME'].'<br/><p>Thanks for stopping on Impact Resumes and we hope to help you the best way we can.</p><p>Your query is important to us, one of our experts will get back to you shortly.</p>';
$mail1->send();

$mail->setFrom('hi@imzolo.com', 'Impact Resume Form Lead');
$mail->addAddress('impactresumes@imzolo.com ', '');  
$mail->addAddress('komal@imzolo.com');               
$mail->addAddress('lakhani@imzolo.com');               
// $mail->addAddress('javedahamad4@gmail.com');               

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

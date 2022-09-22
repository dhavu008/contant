<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	include("mail/src/PHPMailer.php");
	include("mail/src/Exception.php");
	include("mail/src/SMTP.php");
	
	$mail = new PHPMailer(true);

	$name = $_POST['client_name'];
	$client_email = $_POST['client_email'];
	$subject = $_POST['subject'];
	$client_message = $_POST['client_message'];
	try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = false;
    $mail->Port = 587;

    $mail->Username = 'support@magnetoitsolutions.com'; // YOUR gmail email
    $mail->Password = 'bB&G3849'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('Richardyawboatengjr@gmail.com', 'Richard');
    $mail->addAddress('gediyadhaval0811@gmail.com', 'Receiver Name');
    $mail->addReplyTo('Richardyawboatengjr@gmail.com', 'Richard'); // to set the reply to
    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Contact Form";
    $mail->Body = 'Name : '.$name.'<br>Client Email: '.$client_email.'<br> Subject : '.$subject.'<br> Message : '.$client_message.'.';

    $mail->send();
    header('location:index.html?success');
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
<!-- 
	 $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->IsSMTP();

	$mail->Mailer = "smtp";
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "support@magnetoitsolutions.com";
$mail->Password   = "Elsa@12345";
$mail->IsHTML(true);
$mail->AddAddress("gediyadhaval0811@gmail.com", "recipient-name");
$mail->SetFrom("support@magnetoitsolutions.com", "from-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
exit; -->

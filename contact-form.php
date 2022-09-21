<?php
echo "dfg";
echo phpinfo();exit;
	include("mail/src/PHPMailer.php");
	include("mail/src/Exception.php");
	include("mail/src/SMTP.php");
	
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();

	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "Richardyawboatengjr@gmail.com";
$mail->Password   = "Elsa@12345";
$mail->IsHTML(true);
$mail->AddAddress("gediyadhaval0811@gmail.com", "recipient-name");
$mail->SetFrom("Richardyawboatengjr@gmail.com", "from-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
exit;

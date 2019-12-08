<?php

require("class.phpmailer.php");

/* for creating body tag */
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$phone = $_POST['phone'];

$email_body = "Name: $name. \r\n <br>".
			  "Email: $email. \r\n <br>".
			  "Course selected: $course. \r\n <br>".
			  "Mobile no.: $phone. \r\n <br>";






$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "vnvclasses.com";  /*SMTP server*/

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "test@vnvclasses.com";  /*Username*/
$mail->Password = "-b3*B?ns?S9_";    /**Password**/

$mail->From = "test@vnvclasses.com";    /*From address required*/
$mail->FromName = "vnvclasses website";
$mail->AddAddress("vinay.ahlawat@gmail.com");
$mail->AddAddress("nidhigupta.iitk@gmail.com");
$mail->AddAddress("vivek.ahlawat.87@gmail.com");
$mail->AddAddress("himanshugrag@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "New Admission Query received";
$mail->Body = $email_body;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
	echo "Message could not be sent. <p>";
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
}

echo "Message has been sent";

header("location: ../index.html");

?>
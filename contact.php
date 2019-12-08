<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$course = $_POST['course'];
	$phone = $_POST['phone'];

	$email_from = 'vnv-website query form';
	$email_subject = 'New Admission Query received';

	$email_body = "Name: $name. \n ".
				  "Email: $email. \n".
				  "Course selected: $course. \n".
				  "Mobile no.: $phone. \n";

	$to_1 = "himanshugrag@gmail.com";
	$to_2 = "himanshugrag.hg@gmail.com";

	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $email \r\n";

	mail($to_1,$email_subject,$email_body,$headers);
	mail($to_2,$email_subject,$email_body,$headers);

	header("location: index.html");
?>
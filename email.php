<?php

if(isset($_POST['toaddress'], $_POST['fromaddress'], $_POST['emailmessage'])) {
	email($_POST);
}

function email($array) {
	$to 		= $array['toaddress'];
	$from 		= $array['fromaddress'];
	$message 	= $array['emailmessage'];

	$headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	$subject = "This was sent by ajaxform on ampnet(media)";

	mail($to, $subject, $message, $headers);

	echo "You just emailed ".$to." from ".$from."<br>";
	echo "<h3>Your message:</h3>";
	echo "<p>".$message."</p>";
}





<?php

	$file = file_get_contents('customer.json');
	$file = json_decode($file);

class Bio {
	public $name = "";
	public $email = "";
	public $bio = "";
}

if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {

	if (empty($_POST['name'])) {
		$_POST['name'] = $file->customer->name;
	}
	if (empty($_POST['email'])) {
		$_POST['email'] = $file->customer->email;
	}
	if (empty($_POST['message'])) {
		$_POST['message'] = $file->customer->message;
	}
	$customer['customer'] = $_POST;
	$json = $customer;

	$ourBio->name 	= $json['customer']['name'];
	$ourBio->email 	= $json['customer']['email'];
	$ourBio->bio	= $json['customer']['message'];

	$data = json_encode($json);
	file_put_contents('customer.json', $data);
	bioBlock($ourBio->name, $ourBio->email, $ourBio->bio);
} else {
	$ourBio = new Bio;
	$ourBio->name = $file->customer->name;
	$ourBio->email = $file->customer->email;
	$ourBio->bio = $file->customer->message;
}

function bioBlock($name, $email, $bio) {
	echo "<h1>Hi my name is <span style='text-transform:capitalize;'>".$name."</span></h1>";
	echo "<h3>You can contact me at <a href='mailto:".$email."'>".$email."</a>";
	echo "<h2>Bio:</h2><p>".$bio."</p>";
}
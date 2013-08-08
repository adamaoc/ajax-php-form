<?php
// not sure if file_get_contents is the most secure way for this
// but it gets the json code from the file
	$file = file_get_contents('../ajax-php-form/customer.json');
	$file = json_decode($file);

// sets up the Bio class
class Bio {
	public $name = "";
	public $email = "";
	public $bio = "";
}

// check and see if the form has been sumbited 
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {

	// checks to see if a filed was left blank
	// if so it adds the content that's already in json data
	if (empty($_POST['name'])) {
		$_POST['name'] = $file->customer->name;
	}
	if (empty($_POST['email'])) {
		$_POST['email'] = $file->customer->email;
	}
	if (empty($_POST['message'])) {
		$_POST['message'] = $file->customer->message;
	}
	// adds post data to a new customer array
	$customer['customer'] = $_POST;
	$json = $customer;

	// adds our new array to the ourBio class to more easily display
	$ourBio->name 	= $json['customer']['name'];
	$ourBio->email 	= $json['customer']['email'];
	$ourBio->bio	= $json['customer']['message'];

	// encodes and puts the new json back into the file
	$data = json_encode($json);
	file_put_contents('../ajax-php-form/customer.json', $data);

	// builds out the bio section of the page
	bioBlock($ourBio->name, $ourBio->email, $ourBio->bio);
} else {
	// if the form wasnt submited this takes the info right from the json file
	$ourBio = new Bio;
	$ourBio->name = $file->customer->name;
	$ourBio->email = $file->customer->email;
	$ourBio->bio = $file->customer->message;
}


// function that builds out the bio section
function bioBlock($name, $email, $bio) {
	echo "<h1>Hi my name is <span class='name'>".$name."</span></h1>";
	echo "<h3>You can contact me at <a href='mailto:".$email."'>".$email."</a>";
	echo "<h2>Bio:</h2><p>".$bio."</p>";
}
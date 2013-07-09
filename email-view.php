<?php 
?>
<section class="emailbox" >
	<h2>E-Mail Form:</h2>
	<form action="email.php" method="post" class="emailform">
	<p>Here's a form that will send out an email to a specific address from a specific address using AJAX and PHP.</p>
		<input type="text" name="toaddress" placeholder="E-Mail To:" />
		<input type="text" name="fromaddress" placeholder="From:" />
		<textarea name="emailmessage" placeholder="Message here..."></textarea>
		<input type="submit" value="Send!" />
	</form>
</section>
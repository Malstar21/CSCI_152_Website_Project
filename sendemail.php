<?php
	if(isset($_POST["submit"]))
	{
		$name = $_POST['name'];
		$useremail = "From: " . $_POST['email'] . "\n" . $_POST['comment'];
		
		echo "we did it";
		mail("teamseem1@gmail.com", $name , $useremail);
	}
header("Location: http://localhost/reading.html")
?> 
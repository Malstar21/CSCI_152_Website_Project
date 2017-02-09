<?php
	$dbhost = "localhost";
	$user = "root";
	$password = "";
	$db = "seem website";
	
	$conn = mysql_connect($dbhost, $user, $password);
	mysql_select_db($db);
	
	if ($conn == false) {
		die("Connection failed");
	}
	echo "connected";
	
	if(isset($_POST['submit'])) {
		$UserName = mysql_real_escape_string($_POST['user']);
		$Password = mysql_real_escape_string($_POST['pass']);
		$sql = "INSERT INTO user accounts (UserName, Password) VALUES ('$UserName', '$Password') ";
		
		if(mysql_query($sql)) {
			echo "Records added";
		}
		else {
			echo "ERROR";
		}
	}
	header("Location:http://localhost/registerPage.html")
?>
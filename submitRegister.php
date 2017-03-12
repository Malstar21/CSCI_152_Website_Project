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
		$UserName = ($_POST['uname']);
		$Pass = md5($_POST['psw']);
		$Email = ($_POST['email']);
		$DOB = ($_POST['bday']);

		$sql = "INSERT INTO useraccounts (UserName, Password, Email, Birthday) VALUES ('$UserName', '$Pass', '$Email', '$DOB')";

		if(mysql_query($sql)) {
			echo "Records added";
		}
		else {
			echo "ERROR";
		}
	}
	
	// just goes back to register page for now
	header("Location:http://localhost/registerPage.html")
?>
